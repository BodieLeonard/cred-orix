
<?php

/** Load WordPress Administration Bootstrap */
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );

/** Load WordPress Administration Bootstrap */
include_once('/wp-admin/includes/admin.php');
include_once('/wp-includes/ms-functions.php');

$$response = "";
// cange THE FIRM in the menu to OUR FIRM
function addProvenSuccess($title, $content ) {
	
	global $response;
	global $wpdb; 

	$sql = 'INSERT INTO `wp_posts` (`post_author`,  `post_content`, `post_title`,`post_status`, `post_type`, `post_excerpt`, `to_ping`, `pinged`, `post_content_filtered`)
			VALUES (1, "'.$content.'", "'.$title.'", "publish", "provensuccess", "", "", "", "");';
	$task = $wpdb->query($sql);

	$object_id = mysql_insert_id();
	//$sql = 'INSERT INTO `wp_term_relationships` (`object_id`,  `term_taxonomy_id`) VALUES ("'.$object_id.'", "92");';
	$sql = 'INSERT INTO `wp_term_relationships` (`object_id`,  `term_taxonomy_id`) VALUES ("'.$object_id.'", "93");';
	$task = $wpdb->query($sql);



	if ($task === false) {
		$response .= "<br>Error inserting the proven success<br>";
	} else {
		$response .= "<br>Successfully updated the proven success.<br>";
	};


};

function randomizeProvenSuccess(){
	global $wpdb; 

	$sql = "UPDATE `wp_posts` SET `menu_order` = FLOOR( 1 + RAND( ) *200 ) WHERE post_type = 'provensuccess'";
	$task = $wpdb->query($sql);
};
randomizeProvenSuccess();

/*
// Leverage Finance
addProvenSuccess("Peninsula Packaging ", "Peninsula Packaging is a provider of custom thermoformed plastic packaging products for the fresh produce and bakery markets. The Company has a fully integrated operating platform, which includes extrusion, thermoforming, and labeling.");

addProvenSuccess("The Newark Group", "The Newark Group is a leader in integrated manufacturing of 100% recycled paperboard and related products in North America. The Company supplies the raw material used to produce products, making it a self-sustaining, environmentally sound company.");

addProvenSuccess("Fleetgistics", "Fleetgistics is one of the largest providers of same-day logistics services in North America. Company serves a nationwide client base across numerous industries, with specialized offerings for long term care pharmacies, medical laboratories, and automotive aftermarket parts retailers and distributors.");

addProvenSuccess("J. McLaughlin", "Founded in 1977, J. McLaughlin is retailer of classic American clothing and accessories brands for men and women.");

addProvenSuccess("Impact Facility Services", "Impact Facility Services is a provider of inspection and repair services for fire life safety systems for commercial and industrial customers across the United States. The company conducts business under the brands Impact Fire Services and Academy Fire Protection.");

addProvenSuccess("Sprinkles Cupcakes", "Sprinkles is retailer of premium cupcakes, ice cream and cookies, made from the freshest and highest quality ingredients, and widely acknowledged as the world’s first cupcake bakery.");

addProvenSuccess("Hydraulex International", "Hydraulex International is a worldwide remanufacturer and distributor of hydraulic pumps, motors, valves/servo, and cylinders for a vast variety of industrial, mobile, mining and oil-field applications.");

addProvenSuccess("Things Remembered", "Things Remembered is the only national multi-channel specialty retailer that exclusively designs and sells high-quality personalized gifts for all occasions.");

addProvenSuccess("ThunderWorks", "ThunderWorks provides the leading non-drug solution for dog and cat anxiety, sold through specialty and independent pet store channels.");

addProvenSuccess("Epic Health Services", "Epic Health Services provides pediatric home healthcare throughout Texas. Epic’s services are designed to provide a high quality, lower cost alternative to prolonged hospitalization for medically fragile and chronically ill children.");

addProvenSuccess("Data Device Corporation", "Data Device Corporation is the world leader in the design and manufacturing of high-reliability data bus, motion control and solid-state power controller products for aerospace & defense vehicles and industrial applications.");

addProvenSuccess("OrthoLite", "OrthoLite is the world’s leading supplier of open cell foam insoles found in more than 140 million shoes each year, including ASICS, Nike, Puma, Vans and Timberland. OrthoLite combines polyurethane and recycled rubber to provide superior cushioning, comfort, breathability and durability.");

addProvenSuccess("Bonotel", "Bonotel is an aggregator and wholesale distributor of branded and boutique luxury hotel rooms to a longstanding base of international wholesale clients. The Company works with a network of more than 2,200 hotel partners and provides seamless electronic distribution to more than 1,500 international tour operators.");

addProvenSuccess("Bioventus", "Bioventus is an international orthobiologics company developing devices and therapies for bone stimulation and joint pain.");

addProvenSuccess("Highgate Hotels", "Highgate Hotels is a premier operator of over 60 hotel properties with a significant presence as an operator of full-service hotels in several major markets including Honolulu, Miami, San Francisco, Boston, and New York City.");

addProvenSuccess("International Equipment Solutions", "International Equipment Solutions is a global engineered equipment platform serving the construction, agriculture, landscaping, infrastructure, recycling, demolition, mining, and energy markets.");

addProvenSuccess("Z Wireless", "Z Wireless is a certified Verizon reseller agent of wireless voice and data communications services and one of the largest operator of exclusive Verizon Wireless Premium Retailer stores in the United States.");

addProvenSuccess("United States Environmental Services ", "United States Environmental Services is a provider of mission-critical, recurring industrial services and non-discretionary environmental services.  Company offers \"response\" (oil spill clean-up, remediation) and industrial cleaning with both scheduled and emergency capabilities. ");

addProvenSuccess("Luxury Optical Holdings", "Luxury Optical Holdings is the largest domestic retailer of ultra-luxury glasses frames, sunglasses and other eyewear. The company's footprint covers key luxury markets throughout the United States and operates under the trade names Morgenthal Frederics, Lunettes, Diva, Davante and Optical Fashion Centers. ");


// Venture
addProvenSuccess("Bigleadsports", "Bigleadsports owns and aggregates leading sports websites, brands and franchises across all major sports leagues, with owned and affiliated sports websites, blogs and games.  It focuses on producing and aggregating unique, independent content across an array of websites for each specific sport");

addProvenSuccess("Coupon Cabin","Coupon Cabin is an online coupon publisher that works with merchants to drive online sales by aggregating and delivering online promotional codes, discount offers and printable coupons to consumers");

addProvenSuccess("FUHU", "Fuhu, the creator of the nabi tablet, is the leading designer, seller and innovator of thoughtful consumer products and services for children. Fuhu is committed to creating children's solutions that are: (1) socially responsible, (2) made right, (3) make a difference in people's lives, (4) For Parents. By Parents. and (5) dedicated to the intellectual development of children.");


addProvenSuccess("Operative Media", "Operative Media has developed software and services that help publishers, agencies, networks, and broadcasters simplify the businesses of adverting.  Media companies rely on Operative to sell, traffic, and bill premium ad inventory, increasing revenue and decreasing overhead.  ");


addProvenSuccess("Rhythm NewMedia", "Rhythm provides an ad management platform that helps premium media companies monetize their mobile video content. Rhythm is able to dynamically insert highly targeted advertisements into publisher videos that users watch when using their tablets and/or smartphones. Rhythm’s technology allows it to apply logic to the ad delivery process, such that the Company can determine which particular ad a user will receive, where and how an ad appears, and whether the ad should be displayed before or during a video segment.");


addProvenSuccess("Zoom Media", "Zoom is leading the development and growth of Digital Place-based media and is the world's largest provider of ad-supported video entertainment and communications networks in the Fitness industry. Zoom provides advertisers with media and marketing solutions in leisure destinations that reach active, upscale consumers who are harder to reach through traditional advertising. ");


addProvenSuccess("Undertone", "Undertone develops digital advertising solutions for brands. It offers a suite of video, high impact and display ad formats that enable advertisers to engage consumers across mobile and desktop environments. ");


addProvenSuccess("Ticketfly", "Ticketfly is a leading provider of data-driven ticketing and digital marketing solutions for venues and promoters in the live events sector. It delivers its solutions through a self-service, SaaS platform and is the only offering on the market that uses cloud-technology to deploy a fully-integrated ticketing and marketing platform at scale. ");


addProvenSuccess("CustomInk", "CustomInk is a leading provider of on-demand custom apparel. Groups and event organizers, including charities, student groups, bands, small businesses, corporations, and family reunions, can design and order custom printed t-shirts and other apparel through the CustomInk website. ");


addProvenSuccess("Empathica", "Empathica provides a customer experience management software and services solution to retailers to help them measure, manage and improve the experiences of their customers.  Its customer experience management system combines web-based software, performance reporting, business intelligence software and value-added services.                     ");


addProvenSuccess("Managed Objects", "Managed Objects provides a Business Service Management software suite that allows large companies to effectively monitor, manage, and measure their complex and diverse IT systems.  Its software aggregates existing IT assets into an integrated, centralized real-time dashboard that allows IT professionals to prioritize the most critical business services and troubleshoot IT problems before they impact the end-user.");


addProvenSuccess("Softgate Systems", "Softgate  has transformed the payments industry with the Retail Payments Exchange—the only open exchange connecting ISOs, integrated partners, service providers, merchants, retailers, and billers to leading services and technologies that meet the needs of the cash-preferred consumer base.  ");


addProvenSuccess("SugarSync ", "SugarSync is a cloud-based file storage and synchronization service (documents, photos, music, etc.) that operates across all platforms including Apple and Android powered phones and tablets, Windows based PCs, and Macintosh computers.  ");


addProvenSuccess("T2 Systems", "T2 is a technology-focused parking system provider with deep roots in the evolving parking industry. It delivers sophisticated data and tools to parking operations, enabling them to achieve greater efficiencies, increased revenues and proven ROI.");


addProvenSuccess("TOA ", "TOA is the leading provider of cloud-based field service solutions that optimize the last mile of customer service for enterprises by coordinating and managing activities between dispatchers, mobile employees and their customers. TOA’s Field Service SaaS continuously monitors field service requests coming in from contact centers, schedules the right field service representative, monitors current inventories, accurately predicts service windows, and optimizes field operations. ");


addProvenSuccess("Airbiquity", "Airbiquity provides automobile OEMs, wireless carriers and Tier 1 suppliers with a proprietary platform to deploy and manage connected vehicle solutions. These solutions provide end users with in-vehicle smartphone connectivity, content, navigation, vehicle diagnostics and responsive safety solutions.  ");


addProvenSuccess("Interactions", "Interactions is a hosted service provider that delivers conversational sales, service and support solutions across every device with type, touch or talk capabilities. Its patented technology for automated voice and other interactive systems delivers an unprecedented level of understanding that engages customers in a productive, natural conversation.");


addProvenSuccess("Workforce", "Workforce is a provider of employee workforce management software for time and attendance systems targeting mid- to large-sized employers.  Its software automates and streamlines interactions between employers and their workforce.  ");


addProvenSuccess("Amber Road", " Amber Road is a leading provider of cloud based global trade management (GTM) solutions that automate import and export processes to enable goods to flow across international borders in the most efficient, compliant and profitable way. It delivers the GTM solution using a Software-as-a-Service model and leverages a highly flexible technology framework to quickly and efficiently meet its customers’ unique requirements around the world");


addProvenSuccess("Acclaris", "Acclaris provides an integrated software and services platform that facilitates the administration of consumer-directed healthcare accounts. These consumer-directed healthcare accounts include flexible spending accounts, health reimbursement accounts, and health savings accounts. ");


addProvenSuccess("AdvantEdge Healthcare", "Advantage Healthcare provides revenue cycle management and practice management solutions to hospital-based and large office-based physician practices. The Company offers medical claims transaction processing services through its proprietary web-based practice management system to physicians and third-party physician billing companies. ");


addProvenSuccess("Athenahealth", "Athenahealth provides comprehensive medical office automation and billing capabilities by combining web-based practice management software with payor knowledge and business services such as eligibility verification and claims submission to insurance collection. ");


addProvenSuccess("Cadent", "Cadent is an innovative provider of products and services that use computer-aided design and computer-aided manufacturing to service the orthodontic and dental industries, reducing the need for physical plaster impressions.  Its products eliminate process inefficiencies and improve outcomes for dental and orthodontic practitioners and patients.  ");


addProvenSuccess("Greenway Medical", "Greenway Medical is a software and services provider focused on integrating a physician practice's clinical and business functions. Its software solutions enable physicians to improve their practice’s efficiency and quality of life, reduce overhead costs, comply with government regulations and improve their cash flow, resulting in a significant ROI on the purchase.");


addProvenSuccess("Pathology", "Pathology is a full-service independent Women's Health laboratory, providing expertise in reproductive FDA donor testing as well as anatomic, molecular and digital pathology services. Its integrated diagnostic services help doctors personalize patient care to optimally treat disease and maintain health and wellness. ");


addProvenSuccess("Talyst", "Talyst provides automated central pharmacy hardware and software to acute care hospitals, long term care facilities and correctional facilities. The Company’s automation solutions are designed to enable healthcare facilities to acquire, manage, dispense and administer medications in a safer and more efficient manner, resulting in a reduction of medication errors, operating costs and wasted medicine ");


addProvenSuccess("Aprimo", "Aprimo produces software that provides web-based software applications to fortune 1000 corporations that address needs in marketing operations and demand creation.  The Company is in a subset of the Enterprise Marketing Management sector called Marketing Resource Management that provides marketing management software and services to such companies.  ");


addProvenSuccess("Kaltura", "Kaltura provides the world's first and only Open Source Online Video Platform.  Its online video platform, which is primarily offered as a hosted Software-as-a-Service, provides its customers with the ability to integrate, publish, distribute and monetize high quality video content online to a broad array of internet connected devices ");


addProvenSuccess("mindSHIFT", "mindSHIFT is one of the largest IT outsourcing and cloud services providers, serving small and mid-size businesses for more than 15 years.  The Company’s products allow companies to reduce their overall IT costs by eliminating IT personnel, while receiving network reliability and protection of crucial IT assets. ");


addProvenSuccess("MX Logix", "MX Logic is a managed security services provider of email and Web security services for small-to-medium-sized businesses.  Its customers utilize MX Logic to protect their networks against email and Web threats.  ");


addProvenSuccess("Scivantage", "Scivantage is a provider of information-enabled software dedicated to transforming complex information and processes into intuitive user experiences for the financial services industry. With proven expertise in online brokerage, tax and portfolio reporting, and wealth management applications, Scivantage delivers intelligent and actionable information that goes beyond the boundaries of traditional financial software, helping improve investment decisions.");


addProvenSuccess("Kemp Technologies", "Kemp provides network load balancing appliances and software solutions to small and medium businesses. Load balancing appliances and software are methodologies used to distribute computing demand across multiple servers to optimize web applications, minimize response time, and avoid having a single server overloaded. ");


addProvenSuccess("Panasas", "Panasas is the leader in hybrid scale-out NAS for technical computing environment and offers hardware and software storage solutions that are optimized for high performance cluster computing. Panasas systems are optimized for highly demanding big data workloads in design and discovery including bioscience, energy, finance, government, manufacturing, and other core research and development sectors.");


addProvenSuccess("SkyBitz", "SkyBitz is the leading remote asset tracking and information management service provider, specializing in real‐time decision-making tools for companies with unpowered assets such as tractor-trailers, intermodal containers, rail cars, power generators, heavy equipment and other assets. SkyBitz´s asset tracking solution is delivered to commercial, transportation, military and public safety customers, including sensitive shipment haulers of Arms, Ammunition and Explosives cargos.");


addProvenSuccess("Virtustream", "Virtustream is the enterprise-class cloud software and services provider trusted by enterprise customers worldwide to migrate and run their mission-critical applications in the cloud.");


addProvenSuccess("INRIX", "INRIX leverages big data analytics to reduce the individual, economic and environmental toll of traffic congestion. Through cutting-edge data intelligence and predictive traffic technologies, INRIX helps leading automakers, fleets, governments and news organizations make it easier for drivers to navigate their world.");


addProvenSuccess("AM3", "Access Media 3 is a private cable operator providing high-speed Internet, TV and voice services to residential multi-dwelling units such as condominiums and apartment communities.");


addProvenSuccess("Broadsoft", "BroadSoft provides voice over IP (VoIP) application software that enables fixed-line and wireless telecommunications service providers, such as Verizon and Sprint, to offer VoIP to both enterprise and residential end users.  The Company is the market leader in the VoIP application software space and its family of carrier-class software products provides the needed scalability, open architecture and reliability for telecommunications companies.  ");


addProvenSuccess("Tangoe", "Tangoe is a leading global provider of Connection Lifecycle Management software and services to a wide range of global enterprises and service providers. The company’s Connection Lifecycle Management technology, Matrix, is an on-demand suite of software and services designed to turn on, manage, secure, and support various connections in an enterprise’s communications lifecycle, including mobile, fixed, machine, cloud, social, and IT.");


addProvenSuccess("SummitIG", "SummitIG is a custom network solutions and bandwidth infrastructure provider. Leveraging its extensive network infrastructure across the state, SummitIG specializes in delivering dark fiber networks that support and extend data centers’ connectivity");


addProvenSuccess("Quench", "Quench is a water technology company that designs installs, leases, and services \"bottle-less\" water filtration systems (also known as point-of-use water coolers) and ice dispensers. Quench is the largest provider in North America, serving more than 50,000 customers, including over 40% of the Fortune 500. Quench systems purify tap water using state-of-the-art technology, providing a more cost-effective and environmentally-responsible solution than delivery of water in 5-gallon jugs.");

*/








?>

<html>
<link rel="stylesheet" href="/wp-content/themes/orix/style.css" type="text/css" media="all">
	<body class="" style="padding:100px">
		<section class="centered">
			<h1>Proven Success Automation</h1>
			<p></p>
			<hr>
			<h2>Tasks</h2>
			<p>
				<?php echo $response; ?>
			</p>
		</section>
	</body>
</html>
