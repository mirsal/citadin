<?php use_stylesheet('homepage') ?>
<div class="home-page container">
	<div class="banner">
		<div class="shadow_left"></div>
		<div class="content">
		
			<div class="contact">
				<h1>Fanny YANIKIAN</h1>
				<address><?php echo sfConfig::get('app_contact_address')?></address>
				<p class="mobile"><label title="mobile">Mobile:</label><?php echo sfConfig::get('app_contact_mobile')?></p>
				<p class="phone"><label title="Portable">Portable:</label><?php echo sfConfig::get('app_contact_phone')?></p>
				<p class="fax"><label title="Fax">Fax:</label><?php echo sfConfig::get('app_contact_fax')?></p>
			</div>
			
			<div class="info_bulle">
				<div class="text">
					Nous mettons l’accent sur la relation humaine, l’écoute et l’accompagnement dans toutes les démarches de nos clients.<br/>
					Nous sommes avant tout un cabinet de conseil immobilier et d’assistance à la relocation, spécialié dans la recherche personnalisée.</br>
					Se service nous permet d’être plus proche de nos clients, nous leur accordons plus de temps et d’écoute.
					Nous évitons  les inadéquations dans les propositions qui leur sont faites en fonction de leur demandes.
					Nous permettons une intégration rapide dans les lieux notamment pour les personnes en mutations professionnelles.<br/>
					Nous proposons également un service d’aide et de conseil aux propriétaires, réalisons Etat Des Lieux et recherche de locataires, montage de dossiers locatif et étude de solvabilité puis mise en relation avec les futurs occupants.<br/>
					Nos prestations sont adaptées à chacun et en fonction des besoins de tous.
				</div>
			</div>
			
			
			<div class="figure">
				<?php echo image_tag('figure.png', array('alt' => 'Fanny YANIKIAN', 'title' => 'Fanny YANIKIAN', 'width' => '100%', 'height' => '100%')) ?>
			</div>
		
		</div>
    	<div class="shadow_right"></div>
    </div>
</div>
