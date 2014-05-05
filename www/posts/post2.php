		<!-- Start post #2 -->
		<div class="post" id="2">
			<h2>Developing this site</h2>
			<p>Posted: 30 April 2014</p>
			<p>I spent an afternoon putting this site together. As you can tell it is fairly minimal. Most elements aren't even styled. My requirements for the site are as follows:</p>
<ol><li>I wanted something to get up and running quickly</li>
<li>Display what content there is clearly.</li>
<li>I also wanted it to be responsive.
<li>I knew I would have a lot of code examples and therefore wanted those to be displayed well with syntax highlighting etc.</li>
</ol>
			<p>My first port of call was to drop in <a href="http://getbootstrap.com/">Bootstrap</a>. In my rush I even used the Google hosted CDN version and some boilerplate. After all, I don't want to spend all my time on this. I just wanted something quick and clean to work with.</p>
			<pre class="line-numbers"><code class="lang-markup">&lt;!DOCTYPE html&gt;
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
<p>I scrapped Bootstrap but kept the HTML5 boilerplate. At this point I was in two minds whether to write straight CSS or to take the SASS path. I decided on the later as I knew it wouldn't take long to get setup and would benefit me more in the long run.</p>
<p>I added <a href="http://necolas.github.io/normalize.css/">normalize.css</a> and a few basic styles, a quick "responsive" layout (using a fluid width), and used <a href="http://prismjs.com/">PrismJS</a> for syntax highlighting.</p>
<p>With a rough first version working, I am now looking into improving the blog experience. Some features I have in mind at the moment include:</p>
<ul><li>Individual post pages</li>
<li><a href="http://disqus.com/">Disqus</a> commenting</li>
<li>Post summaries on the index page</li>
<li>Writing posts in Markdown</li></ul>
<p>Of course the starting point would be, what's out there already?<br />The source for this site can be found at this Github repo: <a href="https://github.com/davidnormo/portfolio">https://github.com/davidnormo/portfolio</a></p>
		</div>
		<!-- End post #2 -->
