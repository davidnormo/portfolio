<? include 'includes/header.php' ?>
		
		<p>Welcome to my site. Here I write about software development, coding and similar things.</p>
		<br /><br />
		<!-- Start post #2 -->
		<div class="post" id="2">
			<h2>Developing this site</h2>
			<p>Posted: xx March 2014</p>
			<p>I spent an afternoon putting this site together. As you can tell it is fairly minimal. Most elements aren't even styled. My requirements for the site are as follows:</p>
<ol><li>I wanted something to get up and running quickly</li>
<li>Display what content there is clearly.</li>
<li>I also wanted it to be responsive.
<li>I knew I would have a lot of code examples and therefore wanted those to be displayed well with syntax highlighting etc.</li>
</ol>
			<p>My first port of call was to drop in <a href="http://getbootstrap.com/">Bootstrap</a>. In my rush I even used the Google hosted CDN version and some boilerplate. After all, I don't want to spend all my time on this. I just wanted something quick and clean to work with.</p>
			<pre class="line-numbers language-markup"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="en"&gt;
  &lt;head&gt;
    &lt;meta charset="utf-8"&gt;
    &lt;meta http-equiv="X-UA-Compatible" content="IE=edge"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1"&gt;
	&lt;title&gt;Bootstrap 101 Template&lt;/title&gt;

    &lt;!-- Bootstrap --&gt;
	&lt;!-- Latest compiled and minified CSS --&gt;
	&lt;link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"&gt;
	&lt;!-- Optional theme --&gt;
	&lt;link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css"&gt;

    &lt;!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --&gt;
    &lt;!-- WARNING: Respond.js doesn't work if you view the page via file:// --&gt;
    &lt;!--[if lt IE 9]&gt;
      &lt;script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"&gt;</script>
      &lt;script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"&gt;</script>
    &lt;![endif]--&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;h1&gt;Hello, world!&lt;/h1&gt;

    &lt;!-- jQuery (necessary for Bootstrap's JavaScript plugins) --&gt;
    &lt;script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"&gt;</script>
	&lt;!-- Latest compiled and minified JavaScript --&gt;
	&lt;script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"&gt;&lt;/script&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>
			<p>Great! Then I decided to make my primary colour the green you see in the headings on this site. Instead of writing an overriding style sheet I wanted to edit Bootstrap.</p> 
<p>So I downloaded a pre-compiled version of Bootstrap, updated the markup to point towards the local copies of the assets and took a peak into the source. I found that without CSS variables this would take some time and I would probably make some mistakes as I was doing this quickly.</p>
<p>So I downloaded the LESS source of Bootstrap and proceeded to <code>npm install</code> the project dependancies. 2 minutes later, I found the relevant <code>variables.less</code> file. I made a few changes, which included added the Domine serif font from <a href="http://www.google.com/fonts">Google Fonts</a> and making my colour change. I ran <code>grunt dist</code> and then waited for about 5-8 seconds for that to complete.</p> 
<p><b>5-8 seconds!</b> That completely shot my workflow. I liked that everything I wanted (more or less) came right out of the box with Bootstrap but I didn't want to wait so long to make some minor CSS changes, which as we all know, turns into a lot of back and forth between the browser and the editor.</p>
<p>I scrapped Bootstrap but kept the HTML5 boilerplate. At this point I was in two minds whether to write straight CSS or to take the SASS path. I decided on the later as I knew it wouldn't take me long to get setup and would benefit me more in the long run.</p>
		</div>
		<!-- End post #2 -->
		<hr />
		<!-- Start post #1 -->
		<div class="post" id="1">
			<h2>JS Optional Parameters</h2>
			<p>Posted: 28 March 2014</p>
			<p>A well known tip: optional parameters. In JavaScript there is no syntax to denote optional parameters as in PHP or other languages. Therefore you have to do the leg work yourself:</p>
			<pre class="line-numbers"><code class="language-javascript">var testFunc = function(arg1){
	//If arg1 is undefined, will now default to an empty object
	arg1 = arg1 || {};	
};</code></pre>
			<p>MDN has a nice definition of this behaviour:</p>
			<blockquote><code>expr1 || expr2</code> - (Logical OR) Returns <code>expr1</code> if it can be converted to true; otherwise, returns <code>expr2</code>. Thus, when used with Boolean values, <code>||</code> returns true if either operand is true; if both are false, returns false.<br />...<br /><ul><li>false && anything is short-circuit evaluated to false.</li>
<li>true || anything is short-circuit evaluated to true.</li></ul> ... Note that the anything part of the above expressions is not evaluated, so any side effects of doing so do not take effect.</blockquote>
			Source: <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Expressions_and_Operators#Logical_operators">Logical Operators - Mozilla Developer Network</a>
		</div>
		<!-- End post #1 -->
<? include 'includes/footer.php' ?>
