# Code Field plugin for Craft CMS

Adds a code fieldtype that you can use in Matrix field and by it's self. 

![Example In a Matrix](http://i.imgur.com/4bbtxSZ.jpg)

## Installation

1. Download & unzip the repository and place the `craftcleancode` directory into your `craft/plugins` directory
2.  -OR- do a `git clone https://github.com/xkisu/craftcleancode.git` directly into your `craft/plugins` folder.  You can then update it with `git pull`
3.  -OR- install with Composer via `composer require xkisu/craftcleancode`
4. Install plugin in the Craft Control Panel under Settings > Plugins
5. The plugin folder should be named `craftcleancode` for Craft to see it.  GitHub recently started appending `-master` (the branch name) to the name of the folder for zip file downloads.

This plugin works on Craft 2.4.x and Craft 2.5.x.

# Usage

Either you can create new fields that use the Code type for displaying single blocks of code, or use a Matrix field to create a nice page flow with code between other elements like rich text.  

# Rendering 

How the code is rendered on the frontend is up to you. Personally I used [Prism](http://prismjs.com/index.html) on my own site, it seems to work quite nice and is very configurable. 

Here is how it looks on my site: (using the Okaidia Prism theme with a custom background color and some extra padding)

![Site Example](http://i.imgur.com/spFGwQj.jpg)

Here is how I setup my page to use Prism with a Matix: (in this instance I have a Matrix called `matrixBody` with 2 fields, a rich text one called text and a code field called code)

```HTML

<article>
    <h1>{{ entry.title }}</h1>
    <p>Posted on {{ entry.postDate.format('F d, Y') }}</p>
    {% for block in entry.matrixbody %} 
        {% if block.type == "text" %} 
            {{ block.text }} 
        {% elseif block.type == "code" %}
            <div class="code-snippet">
                <pre><code class="language-{{ block.code.language }}">
                    {{ block.code.code }}
                </code></pre>
            </div> 
        {% endif %} 
    {% endfor %} 
</article>

```

The code fieldtype contains 2 elements, `#.language` contains the language the user selected, and `#.code` is the actual code. The language can be inputed directly into things like the Ace or CodeMirror web code editors, or Prism for front-end highlighting.