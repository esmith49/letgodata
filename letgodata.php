<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title>LetGo Buyers and Sellers Information</title>
	</head>
	<body>

		<h1>LetGo Data</h1>

		<h2>LetGo Users Profile</h2>

		<ul><li>Somebody between the ages of 18 and 35</li>
			 <li>Bargin hunters that are looking for specific items</li>
			<li>Makes less than $50k a year</li>
			<li>Likes gently used</li>
			<li>Uses mobile apps</li>
			<li>Tech savy</li>
			<li>Someone that has things they no longer use or need</li>
			<li>Someone that doesn't want to deal with the freaks on Craigslist</li>
			<li>Someone that doesn't want to deal with the hassel of having a garage sale</li>
			<li>People who are moving</li>
			</ul>
		<p> Jack Johnson is a 37 year old man cleaning out his fathers garage and found all of the junk his father has collected over 70 years.  Jack does not want to have a garage sale but he has time to upload pictures to his Android phone and meet Michael Myers at his fathers house to collect $75.00 for the old computer equipment</p>
		<p>Michael Myers is a hipster recent college grad working at the Comcast tech support line. He makes about $35,000 a year and is a collecter of old computer memorabilia. Michael like old things because he is a hipster and liked them before they were cool so he dosen't mind used items.  Michael works for Comcast so he has plenty of time to browse his iPhone 6S mobile app while at work. </p>


		<h2>Goals</h2>
		<ul>
			<li>Connect people that have things they don't want to people that want to buy used items</li>
		   <li>Looking to buy old computer equipment</li></ul>


		<h2>LetGo Use Case for the Seller</h2>

		<ul>
			<li>Seller will upload a photo of the item</li>
			<li>Seller will enter a Product Title</li>
			<li>Seller will enter a suggested sale price</li>
			<li>Seller will enter a brief description of the item</li>
			<li>Seller will choose a general category for the item to appear under</li>
			<li>Seller will click the "sell" button</li>
			<li>The site will upload all of the information and make it available to the public</li>
		</ul>

		<h2> LetGo Use Case for The Buyer</h2>

		<ul>
			<li>Buyer will search the site for an item</li>
			<li>Based on the distance and price buyer will click on an item</li>
			<li>Buyer will land on a product</li>
			<li>Buyers will click on "Make an Offer"</li>
			<li>Buyer will enter a dollar amount in the offer line</li>
			<li>Buyer will click on "send"</li>
			<li>Once offer is accepted the seller will confirm by e-mail and ship item</li>
		</ul>
		<h2>Conceptual Model</h2>
		<ul>
			<li>A User has a user name, e-mail address,a password and a location</li>
			<li>A user can buy or sell many items</li>
			<li>An item can only have one user</li>
			<li>An item can have multiple pictures</li>
			<li>Many users can make offers on the item</li>
		</ul>
		<h2>LetGo ERD</h2>
		<img src="Images/letgoerd.svg" about="let go ERD"/>
		<h2>Code Sample</h2>
		<pre>
			<code>
				DROP TABLE IF EXISTS product;
				DROP TABLE IF EXISTS profile;

				CREATE TABLE profile (
				profileId INT UNSIGNED AUTO_INCREMENT NOT NULL,
				email VARCHAR(128) NOT NULL,
				zipCode VARCHAR(10),
				userName VARCHAR(32) NOT NULL,
				UNIQUE(userName),
				UNIQUE(email),
				PRIMARY KEY(profileId)
				);

				CREATE TABLE product (
				productId INT UNSIGNED AUTO_INCREMENT NOT NULL,
				profileId INT UNSIGNED NOT NULL,
				product VARCHAR(140) NOT NULL,
				INDEX(profileId),
				FOREIGN KEY(profileId) REFERENCES profile(profileId),
				PRIMARY KEY(productId)
				);
			</code>
		</pre>
	</body>
</html>