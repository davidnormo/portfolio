## Command Line CMS
3 May 2014  
  
In my previous post I talked about setting up this site. This post looks at how I've extended it 
since then, namely improvements to managing the content. The brief specification I wrote looked 
like this:  

> 1. Individual post pages
> 2. Disqus commenting
> 3. Post summaries on the index page
> 4. Writing posts in Markdown

The functionality I've added addresses point 4 and puts the site in a good position to implement 
points 1 and 3. There are a few constraints I am working with, I'll mention them here:

- I host this site for free with <a href="http://000webhost.com">000webhost.com</a>. The resources 
however are largely enough for my needs.
- I don't have access to the command line on the server.
- I work on this site in my spare time between revising for 3rd year degree exams and being a husband and a wife. 

### Assessing the situation
Obviously Wordpress jumps to mind. It's free, has a great number of plugins, has a good community 
supporting it and regularly contributing, etc. However I didn't want to go back to theming again, 
I just sorted that out. I didn't want to mess with syntax highlighting again or their 
documentation for how to output a blog title or some other suck niggly problem. So a one of the 
nice big blog softwares was probably out of the question. I wanted a simple, drop in package that 
gave me the functionality I needed, or could be easily extended, without me having to learn their 
API and go back trawling through the markup and CSS.

After a bit of internal deliberation, I decided to put something together myself. Not trying to 
reinvent the wheel but also not getting stuck with a blog software that was overpowered for my 
needs and would cause more hassle in the long run if I wanted to extended it in the future.

I was starting to get an idea of what I wanted or rather what I wanted to avoid:

- I didn't want to have to worry about security, users, logins etc. These would detract my attention from writing actual blog functionality and would slow the whole process up.
- I didn't want to put a huge amount of effort into the writing interface. I already had a nice work flow, writing in vim with access to the command line.

### The Decision

Therfore I decided to write a command line CMS. I could write the blog posts in one directory, the CMS could process these and output them to the `www/` dir. The system could operate on my local machine and then to publish the new posts I could simply FTP transfer the whole `www/` dir to the server.

### Implementation 

My final directory structure looks like this, printed using [`tree`](http://unixhelp.ed.ac.uk/CGI/man-cgi?tree):
```
.
├── Gruntfile.js  
├── cms  
│   └── post  
├── content  
│   └── post3.md  
├── sass  
│   ├── _norm.scss  
│   ├── _vars.scss  
│   └── main.scss  
└── www  
    ├── css  
    │   ├── highlight.css  
    │   ├── main.css  
    │   └── prism.css  
    ├── img  
    │   └── favicon.ico  
    ├── includes  
    │   ├── footer.php  
    │   └── header.php  
    ├── index.php  
    ├── js  
    │   ├── highlight.pack.js  
    │   └── prism.js  
    └── posts
        ├── post1.php  
        ├── post2.php  
        └── post3.html  
```
