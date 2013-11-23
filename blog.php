<? include 'includes/header.php' ?>
The observer pattern is a solution to notifying when an event occurs. It is also know as the publish/subscribe method. Subscribers register to receive notifications from the publisher, who can then broadcast to all subscribers.

For example, the situation I’m using is when a new contact is created in an address book application I was contributing to. Subscribers listening for this event are notifed, in this case they are handlers for other services such as Google Contacts, Facebook and what ever else I choose to subscribe.

Every time a certain MySQL table was updated or inserted into I want to call a third party API so MySQL Triggers were out of the question. I was working within the Zend Framework but I couldn’t find an obvious solution someone had already come up.

My implementation uses the Observer pattern, to form a basic event listener for certain queries. My code extends the Zend_Db_Table_Abstract class. It is also applicable if you aren’t using Zend Db and have a MySQLi wrapper or PDO implementation.

Let’s start with how we will register our observers:

class My_Db_Table extends Zend_Db_Table_Abstract
{
protected static $observers;

public function addObserver( $obj, $query, $table = null )
{
if( !method_exists( $obj, 'notify' ) ){
throw new InvalidArgumentException( "Observer must have a notify method" );
}

$table = ( isset( $table ) ? $table : $_name );
self::$observer[$table][$query][] = $obj;
return true;
}
}

That will do for now, we can further this example when we have more to work with. Nowe are able to keep track of our observers and are registered in the following way:

$table = new My_Db_Table();
$table->addObserver( new Observer(), 'Insert' );

Next we need to select observers for a specific query. I want to make this fairly useful so I will support the following query types- Insert, Update, Delete and *. The * indicates observing all available queries. See Suffix #1 for nots on select queries. I also want to support registering an observer to a specific table or all tables with * again:

public function isObserved( $query, $table = null )
{
$table = ( isset( $table ) ? $table : $_name );

$allObservers = ( !empty( self::$observer['*']['*'] ) ? self::$observer['*'][$query] : array() );
$queryObservers = ( !empty( self::$observer['*'][$query] ) ? self::$observer['*'][$query] : array() );
$observers = array_merge( $allObservers, $queryObservers );

$allObservers = ( !empty( self::$observer[$table]['*'] ) ? self::$observer['*'][$query] : array() );
$queryObservers = ( !empty( self::$observer[$table][$query] ) ? self::$observer['*'][$query] : array() );
$observers = array_merge( $observers, $allObservers, $queryObservers );

return ( !empty( $observers ) ? $observers : false );
}

Phew. isObserved now finds all observers that are registered to a particular table and query or is registered by our * wildcard. It returns the observers it finds or false if there aren’t any.

Now lets write the method that notifies the observers:

public function notifyObservers( $result, $args, $query, $table = null )
{
if( $observers = $this->isObserved( $query, $table ) ){
foreach( $observers as $observer ){
$observer->notify( $result, $args, $query, $table );
}
return true:
}
return false;
}

Now all we have to do is add our notification calling to the query methods we want:

public function insert( array $data )
{
$result = parent::insert( $data );
$this->notifyObservers( $result, array( $data ), 'Insert' );
return $result;
}

Rinse and repeat for the update and delete methods.

We can now optimise this a bit. Our addObserver method is basically a glorified array push method. But because we are using a static array we need to be careful. The good thing is we can register our observers from many different objects. A side effect of this is we might get caught out and register the same observer multiple times. How you ask?

class My_Table extends My_Db_Table
{
protected $_name = 'my_table';

public function __construct()
{
parent::__construct();

$this->addObserver( new Observer(), 'Insert' );
}
}

Every time an object of this class is instantiated we will add another observer to our array. We can do a couple of things to avoid this:

1) We could change the array to be non-static, register observers on the objects that need them and stop adding unessecery complexity! Sorry but thats no good if we need to always observe certain queries being executed. We would then need to add an observer to every obeject instance we create.

2) We can try and maintain a practice whereby the above example won’t happen. Suchas adding all observers to a table in a separate class, an observer builder class. If we change the scope of some of our methods and array we could do this. It would be viable if the requirements for observing DB queries were strict and you didn’t want any random developer on your team adding their own observers.

3) We can check, when adding an observer, that it is the only one of that type! If we need to register multiple observers of the same type to the same query we can pass an extra parameter and force its registration to the array.

The third option may/may not have seemed obvious but it’s good to reflect on decisions we make whilst coding to make sure we are writing the best solutions and code possible.

Lets apply our changes:

public function addObserver( $obj, $query, $table = null, $force = false )
{
if( !method_exists( $obj, 'notify' ) ){
throw new InvalidArgumentException( "Observer must have a notify method" );
}

$table = ( isset( $table ) ? $table : $_name );

if( !$force && isset( self::$observer[$table][$action] ) && self::$observer[$table][$action] === $obj ){
return false;
}

self::$observer[$table][$query][] = $obj;
return true;
}

And that is basically it! All we need to do is register our observers when and where we want. We now have a nice system of calling code when a certain query is executed.

<p>What if we wanted to register an observer on-the-fly? Or the observer doesn’t exist at runtime? We could extend our code to register anonymous functions as well.</p>
<pre>
public function addObserver( callable $obj, $query, $table = null, $force = false )
{
//...
}

public function notifyObservers( $result, $args, $query, $table = null )
{
if( $observers = $this->isObserved( $query, $table ) ){
foreach( $observers as $observer ){
$observer( $result, $args, $query, $table );
}
return true:
}
return false;
}</pre>
<p>And there we have it. We can now do some pretty cool stuff like:</p>
<pre><code class="php lineNumbers">$this->addObserver( function( $result ){
	echo 'Query exctued';
});</code></pre>
<? include 'includes/footer.php' ?>
