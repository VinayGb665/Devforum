<?php
session_start();
//if (session_status() == PHP_SESSION_NONE) {session_start();echo('adfds');}
if($_SESSION['loggedin']!=true) { header('Location:signin.html');}
$user=$_SESSION['user'];
echo($user);

?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript" src="http://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
        <script src="js/markdown/resizer.js" type="text/javascript"></script>
        <script src="js/markdown/Markdown.Converter.js" type="text/javascript"></script>
        <script src="js/markdown/Markdown.Editor.js" type="text/javascript"></script>
        <script src="js/markdown/Markdown.Sanitizer.js" type="text/javascript"></script>
        <script src="js/markdown/Markdown.js" type="text/javascript"></script>
        <link href="css/wmd.css" rel="stylesheet" />
		
		
		
		
		
		
		
		
		
		
		<style>
		
#sub{
position:relative;
top:10px;
left:320px;
width:80px;
height:35px;
border:1px solid #ddd;
border-radius:1px;
font-size:18px;
padding: 1px 1px 1px 1px;
letter-spacing:0.5px;

}
#tit{
font-size:14px;	
padding-left:15px;
letter-spacing:.4px;
width:500px;
height:25px;
position:relative;
top:-80px;

}
#title input{
margin-left:8px;
width:
}
#instructions{
position:relative;
left:62%;
top:300px;
height:300px;
width:360px;
border:1.5px solid #d6d0d0;
border-radius:3px;
background-color:#cac7d0;
font-family: "Segoe UI",Arial,sans-serif;
font-size:18px;
padding:10px 10px 10px 10px;
animation:fade-in 2s;

}
#format{
position:relative;
left:65%;
top:130px;
opacity
height:400px;
width:360px;
border:1.5px solid #d6d0d0;
border-radius:3px;
background-color:#cac7d0;
font-family: "Segoe UI",Arial,sans-serif;
font-size:18px;
padding:0px 10px 10px 10px;
overflow:none;
transition:visibility 2s;

}
@keyframes fade-in{
from{opacity:0;}
to{opacity:1}
}
#instructions ul{
list-style-type:circle;
}
#format ul {
list-style-type:circle;
}
#inn li {
padding:7px 7px 7px 7px; 

}
#tagsContainer{
    border: 1px solid black;
    width: 400px;
    height: 28px;
    overflow-x: scroll;
}
#tagsBox{
    float: left;
}
#tagsTxtBox{
    float: right;
}
#nav{
height:600px;
position:relative;
top:100px;
background-size:cover;
}
#nav_wrapper{

z-index:10;
position:fixed;
height:120px;
top:0px;
width:100%; 	;
background:#053456;
pading:10px;
margin-left:auto;
margin-right:auto;
margin-top:10px;
opacity:0.7;
}
#nav_wrapper ul{
margin-top:30px;
}



#nav_wrapper ul li{
list-style-type:none;
display:inline;
font-wight:bold;
padding:20px 10px 20px 10px;
}


#nav_wrapper a{
font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";

font-size:25px;
font-weight:light;
text-align:center;
color:white;
margin-top:10px;
text-decoration:none;
padding:100px;
}
 
#nav_wrapper ul li:hover{
background:red;

transition:all 0.7s;
opacity:0.5;
}


.active{
background:#000013;
}

#na{
position:relative;
font-size:26px;
top:-49px;
left:-90px;
}
</style>

		
		
		
		
		
		
		
    </head>
    <body>
	
	
	<div id="nav_wrapper" > <br>
<ul>
<li ><a href="Homepage.html" >Home</a></li>
<li class="active" ><a href="#">Topics</a></a></li>
<li ><a href="#">Projects</a></li>
<li ><a href="#">Downloads</a></li>
<li ><a href="#">Example</a></li>
<li ><a href="#">About</a></li>


</ul> </div>

	
	
		<div id="instructions">
<center><h style="font-size:31px;">How to ask</h></center>
<br>
<div >
Is your question about programming?
</br>
</br>
We prefer questions that can be answered, not just discussed.
<br>

<br>
<br>
Provide details. Share your research.


</div>
</div>
<div id="format" style="position:absolute;top:330px;visibility:hidden;">
<center><h style="font-size:31px;">How to format</h></center>
<div id="inn">
<ul >
 <li>put returns between paragraphs</li>

 <li>for linebreak add 2 spaces at end</li>

 <li>_italic_ or **bold**</li>

 <li>indent code by 4 spaces</li>

 <li>backtick escapes `like _so_`</li>

 <li>quote by placing > at start of line</li>

 <li>to make links 

<http://foo.com>
[foo](http://foo.com)<br>	
&lt;a href="http://foo.com">foo&lt;/a&gt;
</li>
<li>basic HTML also allowed</li>
</ul>

</div>
</div>
<script>
function ii(){
document.getElementById('format').style.visibility='visible';

document.getElementById('instructions').style.visibility='hidden';
}

</script>

<div style="position:relative;left:400px;top:-60px;" id="text_wrap" >
    <div class="wmd-panel">
        <div id="wmd-button-bar" style="position:absolute;padding-bottom:-1px;"></div>
        <label for="answer_question_body" class="required"></label>
		<form action="php/questions.php" method="POST">
		<div id="na">Title :</div>
		<input id="tit" name="title" label="Title"  placeholder="What's your programming question? Be specific	" type="text"/>
		
        <textarea class="wmd-input" onFocus="ii();" name="question" id="ask_question_body"></textarea>
		<input id="sub" type="submit"/>	
		</form>

            </div>

    <div id="wmd-preview" class="wmd-panel wmd-preview"></div>
    
</div>

    </body>
		
</html>
