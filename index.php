<?php
include_once('SimplePie.php');
$feed = new SimplePie();
$feed->set_feed_url("https://nitter.bihlink.com/abidnev/rss");
$feed->set_cache_location("cache");
// Run SimplePie //
$feed->init();
$feed->handle_content_type();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>@abidnev</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge,chrome=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
	<style>
		a {
			text-decoration:none !important;
		}
		.card-title, .card-text, p {
			color: #111 !important;
		}
		.twimg { width:100% !important;}
		input[type=checkbox] {
		display: none;
		}
		.label {
		border: none;
		display: inline-block;
		padding: 3px;
		font-size:1.6em;
		/* background: url("unchecked.png") no-repeat left center; */ 
		/* padding-left: 15px; */
		}
		input[type=checkbox]:checked + .label {
		color: #fff;
		/* background-image: url("checked.png"); */
		}
	</style>
</head>
<body>
<?php include 'inc/navbar.php'; ?>
<div class="container"> 

	<div class="card mb-3">
	<div class="row g-0">
		<div class="col-md-4">
		<img src="https://nitter.bihlink.com/pic/pbs.twimg.com%2Fprofile_images%2F754610612345434112%2Fj6w9SJYW_400x400.jpg" class="img-fluid rounded-start" alt="@abidnev">
		</div>
		<div class="col-md-8">
		<div class="card-body p-0">
			<img src="https://nitter.bihlink.com/pic/https%3A%2F%2Fpbs.twimg.com%2Fprofile_banners%2F555564058%2F1448652504%2F1500x500" class="img-fluid rounded-start" alt="@abidnev">
			<h2 class="card-title"><a href="https://twitter.com/abidnev" target="_blank">@abidnev</a></h2>
			<p class="card-text pe-2">CEO / Founder of <a href="https://seolads.com" target="_blank">seolads.com</a> Largest #SEO And #SocialMedia #Marketing Marketplace. #DigitalMarketing #Entrepreneur #WordPress & #Software Developer</p>
		</div>
		</div>
	</div>
	</div>

	<div class="header">
		<h1><?php echo $feed->get_title(); ?></h1>
		<p>Tweets By @abidnev<?php //echo $feed->get_description(); ?></p>
	</div>

	<div class="row row-cols-1 row-cols-md-2 g-3">
		<?php
		foreach ($feed->get_items() as $item):
			$desc = $item->get_description();
			$desc = str_replace('piped.kavin.rocks', 'tuby.me', $desc);
			$desc = str_replace('https://nitter.bihlink.com/search', 'search/', $desc);
			//$desc = str_replace('q=%23', 'q=', $desc);
			$desc = str_replace('a href', 'a target="_blank" href', $desc);
			$desc = str_replace('<img', '<img class="twimg"', $desc);
		?>

			<div class="col">
				<div class="card">
				<div class="card-body">
					<h5 class="card-title"><?php echo $item->get_title(); ?></h5>
					<p class="card-text"><?php echo $desc; ?></p>
				</div>
				<div class="card-footer">
					<?php
					$twlink = $item->get_permalink();
					$twlink = str_replace('twitter.com', 'nitter.bihlink.com', $twlink)
					?>
					<a href="<?php echo $twlink; ?>" target="_blank" rel="nofollow noopener noreferrer"><i class="bi bi-box-arrow-up-right"></i></a> 
					<small class="text-muted"><?php echo $item->get_date('j F Y | g:i a'); ?></small>
				</div>
				</div>
			</div>

		<?php endforeach; ?>
	</div>
</div> 
<?php include 'inc/footer.php'; ?>
</body>
</html>
