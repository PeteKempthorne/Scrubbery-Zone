<?php 

	// require the class definition file
	require_once( "webpage.class.php" );
	
	// create a new instance of the webpage class passing the title and an array of stylesheets to the constructor
	$page = new Webpage( "The Scrubbery Zone - Total Nub Since the 80's", "/css/style.css", "", "", "");
	
	// echo the page contents back to the browser
	$page->getPageTop();
	$page->getNav();
	$page->getMainTop();

	?>
	<div class="row no-pad">
		<div class="col-9 articleTitle">
		<h4>About Me</h4>
		</div>
		<div class="col-3 articleDate">29th April 2018</div>				
		</div>
		<div class="col-lg-12 articleImage">
		<img src="/img/Rimworld-RIP-Birds.png" class="img-fluid"/>
	</div>	
	<div class="col-lg-12 articleText">	
		<p>
			Hello! My name is Pete and I am a 30 something year old guy from England. I have been an avid gamer all my life and have
			decided to create this website to basically give me an outlet to just talk about games and gaming related stuff. My previous
			outlet was doing Youtube videos which I did for many years but I quit eventually as my interest in editing videos, recording
			content and all the other stuff that came with it, faded. On top of all that I gained full-time employment which made it that much
			more difficult to do all those things.
		</p>
		<p>
			So why now make a website doing the same thing? Well I always wanted to be a web developer/web designer so I needed an ongoing
			project to work on. I came up with the idea to combine my love of web development and gaming into one and also fill that little void
			left by my exit from creating video content. Also making articles gives me time to think what I want to exactly write. Making
			videos didn't really allow me to do that as I did let's play style content with little to no editing.
		</p>
		<p>
			Lets talk about a little bit of history of my gaming. I started out playing games round other kids houses playing such classic systems
			as: <strong>Amiga, Spectrum, NES, Sega Master System</strong> and the <strong>Commadore 64</strong>. Eventually I got a
			 <strong>Nintendo Gameboy</strong> and was also given a <strong>NES</strong> and a bunch of games from my uncle. Console gaming 
			 was my forte until the mid to late 90's when we got a home <strong>PC</strong> and I bought <strong>Command & Conquer: Tiberium Sun</strong> to play on it. 
			 It was many years before I moved to <strong>PC</strong> gaming as my primary gaming platform and during that time I had great fun with the <strong>Playstation 1 and 2</strong>,
			 <strong>Nintendo Gamecube</strong> and <strong>Nintento Gameboy Advance SP</strong>. I am sure at some point I might mention
			 classics from those systems in articles I write.
		</p>			
		<p>
			Currently, to this day I am still mostly a <strong>PC</strong> gamer. I do also own a <strong>Nintendo Switch</strong> as well but for ths most 
			part I do not play it super regular. Maybe that will change once certain titles I am waiting for are released though.
		</p>
		<p>
			Finally lets talk about what kind of games you will see me write about here. Well I like a lot of different games but most of all
			I like: <strong>rogue-likes, strategy, city/colony builders and sandbox games.</strong>
		</p>
		<p>
			Pretty much wraps up what I want to talk about for now. If you have any questions you can hit me up via e-mail or Twitter using the
			 links in the sidebar. I may add a FAQ or more to this page eventually if there is any interest. Thanks for reading.
		</p>		
	</div>
	<?php
	$page->getMainBottom();
	$page->getPageBottom();
?>