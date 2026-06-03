<?php
/**
 * Front page template — the full one-page site.
 *
 * @package thebandit
 */

get_header();
?>

	<!-- HERO -->
	<section id="hero">
		<div class="hero-bg"></div>
		<div class="hero-grid-overlay"></div>
		<div class="hero-inner">
			<div class="hero-heading">
				<div class="hero-eyebrow">South Africa's #1 Magician</div>
				<h1 class="hero-title">
					<span class="the">The</span>
					<span class="name">Ban<span>dit</span></span>
				</h1>
				<p class="hero-tagline">His Magic Is Criminal</p>
			</div>
			<div class="hero-img-wrap">
				<div class="hero-img-frame">
					<img src="<?php echo esc_url( thebandit_asset( 'images/hero-cards.jpg' ) ); ?>" alt="The Bandit, South African Magician" class="hero-img" />
					<div class="hero-badge">
						<strong>SA's #1</strong>
						Magician
					</div>
				</div>
			</div>
			<div class="hero-body">
				<p class="hero-desc">
					South Africa's #1 magician. A master of <em>close-up magic, pickpocket entertainment and hypnosis</em>, from intimate table magic to commanding the stage. Expect the unexpected.
				</p>
				<div class="hero-actions">
					<a href="#contact" class="btn-primary">Book The Bandit</a>
					<a href="#video" class="btn-outline">Watch Him Work</a>
				</div>
			</div>
		</div>
		<div class="hero-scroll">Scroll</div>
	</section>

	<!-- MARQUEE -->
	<div class="marquee-section">
		<div class="marquee-track">
			<span class="marquee-item">Close-Up Magic</span><span class="marquee-dot">&#9670;</span>
			<span class="marquee-item">Stage Shows</span><span class="marquee-dot">&#9670;</span>
			<span class="marquee-item">Pickpocket Entertainment</span><span class="marquee-dot">&#9670;</span>
			<span class="marquee-item">Hypnotism</span><span class="marquee-dot">&#9670;</span>
			<span class="marquee-item">Corporate Events</span><span class="marquee-dot">&#9670;</span>
			<span class="marquee-item">Roaming Magic</span><span class="marquee-dot">&#9670;</span>
			<span class="marquee-item">MC Services</span><span class="marquee-dot">&#9670;</span>
			<span class="marquee-item">Illusion Shows</span><span class="marquee-dot">&#9670;</span>
			<span class="marquee-item">Close-Up Magic</span><span class="marquee-dot">&#9670;</span>
			<span class="marquee-item">Stage Shows</span><span class="marquee-dot">&#9670;</span>
			<span class="marquee-item">Pickpocket Entertainment</span><span class="marquee-dot">&#9670;</span>
			<span class="marquee-item">Hypnotism</span><span class="marquee-dot">&#9670;</span>
			<span class="marquee-item">Corporate Events</span><span class="marquee-dot">&#9670;</span>
			<span class="marquee-item">Roaming Magic</span><span class="marquee-dot">&#9670;</span>
			<span class="marquee-item">MC Services</span><span class="marquee-dot">&#9670;</span>
			<span class="marquee-item">Illusion Shows</span><span class="marquee-dot">&#9670;</span>
		</div>
	</div>

	<!-- PULL QUOTE -->
	<section id="quote">
		<div class="container">
			<p class="big-quote reveal">"The <span>best pickpocket magician</span> in South Africa"</p>
			<p class="quote-attr reveal reveal-delay-1">Darren "Whackhead" Simpson, South African Radio Legend</p>
		</div>
	</section>

	<!-- ABOUT -->
	<section id="about">
		<div class="container">
			<div class="about-grid">
				<div class="about-img-single reveal">
					<img src="<?php echo esc_url( thebandit_asset( 'images/about-illusion.jpg' ) ); ?>" alt="The Bandit performing" class="about-img-main" />
				</div>
				<div class="about-text">
					<div class="section-label reveal">The Story</div>
					<h2 class="section-title reveal reveal-delay-1">Born to <em>Steal</em><br/>the Show</h2>
					<div class="divider reveal reveal-delay-2"></div>
					<p class="reveal reveal-delay-2">
						Raised in the heart of Johannesburg, <strong>The Bandit</strong> is South Africa's #1 magician, a world-class entertainer who has spent years mesmerising audiences young and old, across South Africa and internationally.
					</p>
					<p class="reveal reveal-delay-3">
						Trained under private tutelage by some of the world's finest, including <strong>Troye the Mentalist (SA)</strong> and <strong>Gregory Wilson (USA)</strong>, this former magic kid has evolved into a renowned seasoned professional.
					</p>
					<p class="reveal reveal-delay-3">
						His arsenal spans <strong>close-up magic</strong>, <strong>pickpocketing</strong>, <strong>hypnotism</strong>, fork bending, and coin and card effects. Whether it's a corporate gala or an intimate dinner party, The Bandit is a sure winner.
					</p>
					<p class="reveal reveal-delay-4">
						His unique blend of comedy and dramatic magic makes him one of the firm favourites amongst numerous private and corporate clients. His charming personality will make your guests feel right at home, and his magic will catapult them into a whole new world of awe and fascination.
					</p>
					<div class="stats-row reveal reveal-delay-4">
						<div class="stat">
							<span class="stat-number">20+</span>
							<span class="stat-label">Years Experience</span>
						</div>
						<div class="stat">
							<span class="stat-number">SA's #1</span>
							<span class="stat-label">Magician</span>
						</div>
						<div class="stat">
							<span class="stat-number">100+</span>
							<span class="stat-label">Corporate Brands</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- SERVICES -->
	<section id="services">
		<div class="container">
			<div class="section-label reveal">What He Does</div>
			<h2 class="section-title reveal reveal-delay-1">Performance <em>Offerings</em></h2>
			<div class="services-grid">
				<div class="service-card reveal">
					<span class="service-icon">&#127183;</span>
					<h3 class="service-title">Close-Up &amp; Roaming Magic</h3>
					<p class="service-desc">The ultimate ice-breaker. The Bandit moves among your guests creating intimate moments of astonishment with cards, coins, jewellery and everyday objects. Perfect pre-show or cocktail hour entertainment.</p>
					<div class="service-tags">
						<span class="tag">Walk-Around</span>
						<span class="tag">Table Magic</span>
						<span class="tag">Interactive</span>
					</div>
				</div>
				<div class="service-card reveal reveal-delay-1">
					<span class="service-icon">&#127917;</span>
					<h3 class="service-title">Professional Stage Shows</h3>
					<p class="service-desc">No problems with the spotlight. The Bandit commands the room, holding larger audiences captive with riveting illusions, comedy, and dramatic magic that leaves everyone gasping in disbelief.</p>
					<div class="service-tags">
						<span class="tag">Illusions</span>
						<span class="tag">Comedy Magic</span>
						<span class="tag">Large Audiences</span>
					</div>
				</div>
				<div class="service-card reveal reveal-delay-2">
					<span class="service-icon">&#128092;</span>
					<h3 class="service-title">Pickpocket Entertainment</h3>
					<p class="service-desc">The only pickpocket entertainer in Southern Africa. Wallets, watches, belts, ties. All stolen, all returned, all hilarious. An unforgettable act that generates incredible energy and has audiences screaming with laughter.</p>
					<div class="service-tags">
						<span class="tag">Watch Steals</span>
						<span class="tag">Unique in SA</span>
						<span class="tag">Audience Participation</span>
					</div>
				</div>
				<div class="service-card reveal reveal-delay-1">
					<span class="service-icon">&#129504;</span>
					<h3 class="service-title">Hypnotism</h3>
					<p class="service-desc">A certified hypnotist, The Bandit takes willing volunteers on an unforgettable journey, live on stage. Hilarious, mind-bending and completely unique. The moment your audience will never stop talking about.</p>
					<div class="service-tags">
						<span class="tag">Mentalism</span>
						<span class="tag">Predictions</span>
						<span class="tag">Psychological Magic</span>
					</div>
				</div>
				<div class="service-card reveal reveal-delay-2">
					<span class="service-icon">&#127908;</span>
					<h3 class="service-title">MC Services</h3>
					<p class="service-desc">A natural on any stage, The Bandit brings the same charisma and energy to hosting your event, keeping the flow seamless and the audience engaged from start to finish.</p>
					<div class="service-tags">
						<span class="tag">Corporate Events</span>
						<span class="tag">Galas</span>
						<span class="tag">Award Ceremonies</span>
					</div>
				</div>
				<div class="service-card reveal reveal-delay-3">
					<span class="service-icon">&#10024;</span>
					<h3 class="service-title">Family &amp; Promotional Shows</h3>
					<p class="service-desc">Magic for all ages, adapted for any setting. Whether a family event, shopping centre activation or brand promotion, The Bandit tailors the experience to captivate every audience.</p>
					<div class="service-tags">
						<span class="tag">Family Shows</span>
						<span class="tag">Promotional Magic</span>
						<span class="tag">Brand Activations</span>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- CLIENTS / LOGOS -->
	<section id="clients">
		<div class="container" style="text-align:center;">
			<div class="section-label reveal" style="justify-content:center;">Trusted By</div>
			<h2 class="section-title reveal reveal-delay-1">Clients &amp; <em>Brands</em></h2>
			<div class="logos-grid reveal reveal-delay-2">
				<div class="logo-item"><img src="<?php echo esc_url( thebandit_asset( 'logos/absa_white.webp' ) ); ?>" alt="ABSA" class="brand-logo" /></div>
				<div class="logo-item"><img src="<?php echo esc_url( thebandit_asset( 'logos/toyota_white.webp' ) ); ?>" alt="Toyota" class="brand-logo" /></div>
				<div class="logo-item"><img src="<?php echo esc_url( thebandit_asset( 'logos/mtn_white.webp' ) ); ?>" alt="MTN" class="brand-logo" /></div>
				<div class="logo-item"><img src="<?php echo esc_url( thebandit_asset( 'logos/anglo_american_white.webp' ) ); ?>" alt="Anglo American" class="brand-logo" /></div>
				<div class="logo-item"><img src="<?php echo esc_url( thebandit_asset( 'logos/discovery_white.webp' ) ); ?>" alt="Discovery" class="brand-logo" /></div>
				<div class="logo-item"><img src="<?php echo esc_url( thebandit_asset( 'logos/barclays_white.webp' ) ); ?>" alt="Barclays" class="brand-logo" /></div>
				<div class="logo-item"><img src="<?php echo esc_url( thebandit_asset( 'logos/FNB.png' ) ); ?>" alt="First National Bank" class="brand-logo" /></div>
				<div class="logo-item"><img src="<?php echo esc_url( thebandit_asset( 'logos/KFC.png' ) ); ?>" alt="KFC" class="brand-logo" /></div>
				<div class="logo-item"><img src="<?php echo esc_url( thebandit_asset( 'logos/land-rover.png' ) ); ?>" alt="Land Rover" class="brand-logo" /></div>
				<div class="logo-item"><img src="<?php echo esc_url( thebandit_asset( 'logos/Sanlam.png' ) ); ?>" alt="Sanlam" class="brand-logo" /></div>
				<div class="logo-item"><img src="<?php echo esc_url( thebandit_asset( 'logos/Vodacom.png' ) ); ?>" alt="Vodacom" class="brand-logo" /></div>
				<div class="logo-item"><img src="<?php echo esc_url( thebandit_asset( 'logos/sasol_white.webp' ) ); ?>" alt="Sasol" class="brand-logo" /></div>
				<div class="logo-item"><img src="<?php echo esc_url( thebandit_asset( 'logos/bat_white.webp' ) ); ?>" alt="British American Tobacco" class="brand-logo" /></div>
				<div class="logo-item"><img src="<?php echo esc_url( thebandit_asset( 'logos/centriq_insurance_white.webp' ) ); ?>" alt="Centriq Insurance" class="brand-logo" /></div>
				<div class="logo-item"><img src="<?php echo esc_url( thebandit_asset( 'logos/dainfern_college_white.webp' ) ); ?>" alt="Dainfern College" class="brand-logo" /></div>
				<div class="logo-item"><img src="<?php echo esc_url( thebandit_asset( 'logos/mni_white.webp' ) ); ?>" alt="MNI" class="brand-logo" /></div>
			</div>
		</div>
	</section>

	<!-- VIDEO -->
	<section id="video">
		<div class="container">

			<div class="video-header reveal">
				<div class="section-label">See It Live</div>
				<h2 class="section-title">Watch The <em>Magic</em> Unfold</h2>
				<div class="divider"></div>
			</div>

			<div class="video-stage reveal reveal-delay-1">

				<!-- Thumbnail (hidden after play clicked) -->
				<div class="video-thumb" id="videoThumb" onclick="playVideo()" role="button" aria-label="Play showreel">
					<div class="video-thumb-inner">
						<img src="<?php echo esc_url( thebandit_asset( 'images/yt-thumbnail.png' ) ); ?>" alt="" class="video-thumb-bg-img" />
					</div>
					<div class="video-play-btn">
						<div class="play-circle">
							<svg viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
								<circle cx="30" cy="30" r="29" stroke="#05a0eb" stroke-width="1.5" fill="rgba(0,0,0,0.5)"/>
								<polygon points="24,18 48,30 24,42" fill="#05a0eb"/>
							</svg>
						</div>
						<span class="play-label">Watch The Bandit</span>
					</div>
				</div>

				<!-- Iframe (shown after play clicked) -->
				<div class="video-iframe-layer" id="videoIframe">
					<iframe
						id="ytPlayer"
						src=""
						data-src="https://www.youtube.com/embed/KXtSX7TxY1w?rel=0&autoplay=1&color=white"
						title="The Bandit Magic Showreel"
						frameborder="0"
						allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
						allowfullscreen>
					</iframe>
				</div>
			</div>

			<div class="video-footer reveal reveal-delay-2">
				<p>
					Words can only do so much. Watch The Bandit in action: his seamless sleight of hand, his infectious charm, and his uncanny ability to leave an audience completely spellbound. Imagine a table levitating through mid-air, or money appearing right before your eyes.
				</p>
				<a href="#contact" class="btn-primary" style="flex-shrink:0;">Book Your Event</a>
			</div>

		</div>
	</section>

	<!-- TESTIMONIALS -->
	<section id="testimonials">
		<div class="container">
			<div class="section-label reveal">What They Say</div>
			<h2 class="section-title reveal reveal-delay-1">The <em>Verdict</em></h2>
			<div class="testimonials-grid">
				<div class="testimonial-card reveal">
					<p class="testimonial-text">"The best pickpocket magician in South Africa. Absolutely incredible. The audience was completely floored."</p>
					<p class="testimonial-author">Darren "Whackhead" Simpson</p>
					<p class="testimonial-role">South African Radio &amp; Comedy Legend</p>
				</div>
				<div class="testimonial-card reveal reveal-delay-1">
					<p class="testimonial-text">"The Bandit is absolutely amazing. Our guests couldn't stop talking about his performance long after the event ended."</p>
					<p class="testimonial-author">Shakira Carlsen</p>
					<p class="testimonial-role">Mercedes-Benz</p>
				</div>
				<div class="testimonial-card reveal reveal-delay-2">
					<p class="testimonial-text">"I don't know how he does it. What an incredible show, truly one of the best entertainers we have ever had at our events."</p>
					<p class="testimonial-author">Mahlatse</p>
					<p class="testimonial-role">Gautrain</p>
				</div>
			</div>
		</div>
	</section>

	<!-- FAMOUS ENCOUNTERS -->
	<section id="encounters">
		<div class="container">
			<div class="section-label reveal" style="justify-content:center;">Notable Victims</div>
			<h2 class="section-title reveal reveal-delay-1" style="text-align:center;">Pockets He's <em>Picked</em></h2>
			<div class="divider reveal reveal-delay-2" style="margin-left:auto;margin-right:auto;"></div>
			<p class="encounters-desc reveal reveal-delay-2">The Bandit is notorious for pickpocketing some of the biggest names in South Africa and the world, all in good fun, all returned.</p>
			<div class="encounters-names reveal reveal-delay-3">
				<span class="encounter-name">Dynamo</span>
				<span class="encounter-name">Darren Simpson</span>
				<span class="encounter-name">Thapelo Tips</span>
				<span class="encounter-name">Quinton Van de Burgh</span>
				<span class="encounter-name">Douw Steyn</span>
				<span class="encounter-name">Joey Rasdien</span>
				<span class="encounter-name">Morgan Beatbox</span>
				<span class="encounter-name">Trevor Gumbi</span>
				<span class="encounter-name">Franco Mostert</span>
				<span class="encounter-name">Morne Steyn</span>
				<span class="encounter-name">Vincent Koch</span>
			</div>
		</div>
	</section>

	<!-- TIKTOK -->
	<section id="tiktok">
		<div class="container">
			<div class="section-label reveal">Follow Along</div>
			<h2 class="section-title reveal reveal-delay-1">Watch on <em>TikTok</em></h2>
			<div class="tiktok-embed-wrap reveal reveal-delay-2">
				<blockquote class="tiktok-embed"
					cite="https://www.tiktok.com/@kevinkeuvelaar"
					data-unique-id="kevinkeuvelaar"
					data-embed-type="creator"
					style="max-width:780px;min-width:288px;width:100%;">
					<section>
						<a target="_blank" href="https://www.tiktok.com/@kevinkeuvelaar">@kevinkeuvelaar</a>
					</section>
				</blockquote>
			</div>
		</div>
	</section>

	<!-- VENUES -->
	<section id="venues">
		<div class="container">
			<div class="section-label reveal">Where He's Performed</div>
			<h2 class="section-title reveal reveal-delay-1">The <em>Stages</em></h2>
			<div class="venues-grid">
				<div class="venue-group reveal">
					<h3 class="venue-group-title">Comedy Clubs</h3>
					<ul class="venue-list">
						<li>Parkers Comedy Club</li>
						<li>Goliath Comedy Club</li>
						<li>Whackhead's Comedy Club</li>
						<li>Cape Town Comedy Club</li>
					</ul>
				</div>
				<div class="venue-group reveal reveal-delay-1">
					<h3 class="venue-group-title">Casinos</h3>
					<ul class="venue-list">
						<li>Goldreef City</li>
						<li>Silverstar Casino</li>
						<li>Caesars Palace</li>
						<li>Emperors Palace</li>
						<li>GrandWest Casino</li>
						<li>Montecasino</li>
						<li>Carnival City</li>
						<li>Sibaya Casino</li>
					</ul>
				</div>
				<div class="venue-group reveal reveal-delay-2">
					<h3 class="venue-group-title">Theatres</h3>
					<ul class="venue-list">
						<li>The Joburg Theatre</li>
						<li>The Box</li>
						<li>Pop Art Theatre</li>
						<li>The Cirk</li>
						<li>The Barnyard Theatre</li>
					</ul>
				</div>
				<div class="venue-group reveal reveal-delay-3">
					<h3 class="venue-group-title">Estates &amp; Resorts</h3>
					<ul class="venue-list">
						<li>Steyn City</li>
						<li>Sun City</li>
						<li>Fancourt</li>
						<li>Blue Valley Golf &amp; Country Estate</li>
						<li>Eagle Canyon</li>
						<li>The Fairway</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<!-- CONTACT -->
	<section id="contact">
		<div class="container">
			<div class="contact-inner">
				<div class="section-label reveal">Get In Touch</div>
				<h2 class="section-title reveal reveal-delay-1" style="text-align:center;">Book The <em>Bandit</em></h2>
				<div class="divider reveal reveal-delay-2" style="margin-left:auto;margin-right:auto;"></div>
				<p class="reveal reveal-delay-2">
					Ready to make your event truly unforgettable? Whether it's an intimate dinner or a grand stage show, The Bandit delivers a professional performance, show after show after show.
				</p>

				<div class="contact-grid reveal reveal-delay-3">

					<!-- Image column -->
					<div class="contact-image-col">
						<img src="<?php echo esc_url( thebandit_asset( 'images/contact-hands-up.png' ) ); ?>" alt="The Bandit performing an illusion" />
					</div>

					<!-- Form column -->
					<div class="contact-form-col">
						<div class="section-label">Booking Enquiry</div>
						<h3>Send A Message</h3>
						<p>Fill in your details below and The Bandit's team will get back to you promptly to discuss your event.</p>
						<?php
						/*
						 * Two options for the form:
						 *  1. The native form below posts via AJAX → wp_mail() → Resend.
						 *  2. To use WPForms / Contact Form 7 instead, comment out the
						 *     <form> block and drop in your shortcode, e.g.:
						 *     echo do_shortcode('[wpforms id="123"]');
						 */
						?>
						<form id="contact-form">
							<div class="contact-fields">
								<input type="text" name="name" placeholder="Your Name" required />
								<input type="email" name="email" placeholder="Email Address" required />
								<input type="text" name="company" placeholder="Company / Organisation" />
								<div class="date-field-wrap">
									<label class="date-label">Event Date</label>
									<input type="date" name="date" />
								</div>
								<div class="contact-msg" style="grid-column: 1/-1;">
									<select name="eventType">
										<option value="" disabled selected>Type of Event</option>
										<option>Corporate Function</option>
										<option>Wedding</option>
										<option>Private Party</option>
										<option>Trade Show / Expo</option>
										<option>Comedy Club / Theatre</option>
										<option>Festival / Concert</option>
										<option>Other</option>
									</select>
								</div>
							</div>
							<div class="contact-msg">
								<textarea name="message" placeholder="Tell us about your event: venue, expected guests, any special requirements..."></textarea>
							</div>
							<div class="contact-direct">
							<span>Or call us directly</span>
							<a href="tel:+27879439435" class="contact-phone-link">+27 87 943 9435</a>
						</div>
						<button type="submit" class="btn-submit">Send Enquiry</button>
						</form>
					</div>

				</div>
			</div>
		</div>
	</section>

<?php
get_footer();
