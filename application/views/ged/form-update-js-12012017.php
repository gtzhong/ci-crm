<script type="text/javascript">

var paramId = '<?php echo $id;?>';

function appendDataFormUpdate() {			
	var id = parseInt(paramId);
	$.get("<?php echo site_url('ged/get_detail');?>/" + id, function(response) {

	if(response.status) {
		var data = response.data;
		var filename = data.name;
		var filename_arr = filename.split(".");
		var extensionFile = filename_arr.pop();
		var name = filename_arr.join(".");

		$('#update-file-name').val(name);
		$('#update-file-extension').val("."+extensionFile);
		$('#update-id-file').val(data.fileid);
		$('#update-format-file').val(data.format);
		$('#update-size-file').val(data.size);
		$('#update-date-creation').val(data.date_creation);
		$('#update-id-user').val(data.uid);

		$('#update-id').val(data.id);				
		$('#update-old-document-type').val(data.document_type);
		$('#update-createdby').val(data.created_by);
		$('#update-uploadedby').val(data.uploaded_by);
		$('#update-description').val(data.description);
		$('#update-typedocument').val(data.document_type);
		$('#update-clientName').val(data.client_id);
		$('#update-devis').val(data.devis_id);
		$('#update-facture').val(data.facture_id);
		$('#update-soustype').val(data.sous_type);

		showSubFormUpdateDocumentType(data.document_type);
		
		if(data.client_id) {
			generateDevisComboboxUpdate(data.client_id, data.devis_id);
		}
		
		if(data.devis_id) {
			generateFacturesComboboxUpdate(data.devis_id, data.facture_id);
		}
		
		appendFormUpdateSousType(data.document_type, data.sous_type);

		//sous type document infographie
		$('#update-format-ouvert').val(data.format_ouvert);
		$('#update-format-ferme').val(data.format_ferme);
		$('#update-largeur').val(data.largeur);
		$('#update-longueur').val(data.longueur);
		$('#update-nombre-pages').val(data.nombre_pages);
		$('#update-campagne').val(data.campagne);
		$('#update-objet').val(data.objet);
		$('#update-nomde-domaine').val(data.nom_de_domaine);
		$('#update-origine').val(data.origine);
		$('#update-sujet').val(data.sujet);

		//sous type plan 
		$('#update-soustype-plan').val(data.sous_type);

		//sous type piece comptable
		$('#update-soustype-piece-comptable').val(data.sous_type);

		//sous type internet
		$('#update-soustype-site-internet').val(data.sous_type);
		$('#update-origine-general').val(data.origine);
		$('#update-sujet-general').val(data.sujet);

		//sous type administratifs divers
		$('#update-soustype-administratifs-divers').val(data.sous_type);

		//sub form general
		$('#update-ville').val(data.ville);
		$('#update-numero').val(data.numero);
		$('#update-mois').val(data.mois);
		$('#update-societe').val(data.societe);
		$('#update-banque').val(data.banque);
		$('#update-nom').val(data.nom);
		$('#update-piece').val(data.piece);
		$('#update-statuts').val(data.statuts);
		$('#update-assemblees').val(data.assemblees);
		$('#update-descriptif').val(data.descriptif);
	}
	},"json");			
}

function generateClientComboboxUpdate(callback) {
	var container = $('#update-clientName');
	container.attr("disabled", true);

	$.get("<?php echo site_url('ged/get_client');?>", function(data) {
		container.attr("disabled", false);
		if(data) {
			var options = '<option>Aucun</option>';
			for(var i= 0; i < data.length; i++) {
				options += '<option value="'+data[i].id+'">'+data[i].value+'</option>';
			}

			container.html(options);		
		} else {
			container.html('<option value=""></option>');
		}

		if(callback) {
			callback();
		}
	},"json");
}

function generateUserComboboxUpdate(callback) {
	var container1 = $('#update-createdby');
	var container2 = $('#update-uploadedby');
	container1.attr("disabled", true);
	container2.attr("disabled", true);

	$.get("<?php echo site_url('ged/get_user');?>", function(data) {
		container1.attr("disabled", false);
		container2.attr("disabled", false);
		if(data) {
			var options = '<option>Aucun</option>';
			for(var i= 0; i < data.length; i++) {
				options += '<option value="'+data[i].value+'">'+data[i].value+'</option>';
			}

			container1.html(options);
			container2.html(options);

		} else {
			container1.html('<option value=""></option>');
			container2.html('<option value=""></option>');
		}

		if(callback) {
			callback();
		}
	},"json");
}

/**
 * =====================================================================
 */

function  generateDevisComboboxUpdate(clientId, devisId) {
	//reset combobox devis & facture	
	$('#update-facture').html("<option></option>");
	$('#update-devis').html("<option></option>");

	var clientId = clientId ? clientId : $('#update-clientName').val();
	var container = $('#update-devis');

	container.attr("disabled", true);
	if(clientId !== "") {
		$.get("<?php echo site_url('ged/get_devis');?>/" + clientId, function(data) {			
			container.attr("disabled", false);
			if(data) {
				var options = '<option>Aucun</option>';
				for(var i= 0; i < data.length; i++) {
					options += '<option value="'+data[i].id+'">'+data[i].value+'</option>';					
				}

				container.html(options);

				if(devisId) {
					container.val(devisId);
				}
			} else {
				container.html('<option value=""></option>');
			}		
		},"json");
	} else {
		container.html('<option value=""></option>');
	}
}

function  generateFacturesComboboxUpdate(devisId, factureId) {
	var devisId = devisId ? devisId : $('#update-devis').val();
	var container = $('#update-facture');

	container.attr("disabled", true);
	if(devisId !== "") {
		$.get("<?php echo site_url('ged/get_facture');?>/" + devisId, function(data) {
			container.attr("disabled", false);
			if(data) {
				var options = '<option>Aucun</option>';
				for(var i= 0; i < data.length; i++) {
					options += '<option value="'+data[i].id+'">'+data[i].value+'</option>';					
				}

				container.html(options);

				if(factureId) {
					container.val(factureId);
				}
			} else {
				container.html('<option value=""></option>');
			}		
		},"json");
	}else {
		container.html('<option value=""></option>');
	}
}

function resetFormUpdateMetadataUpload() {
	$('input[type=text], textarea, select').val("");
	$('#update-devis').html('<option></option>');
	$('#update-facture').html('<option></option>');
	$('.update-subform-documenttype').hide();
	$('.update-subform-soustype').hide();
	$('.update-nombre-pages').hide();
	$('.update-subform-soustype').find('input').val("");

	//plan
	$('.subform').hide();
}

function showSubFormUpdateDocumentType(type) {
	$('.update-subform-documenttype').hide();
	$('.subform').hide();
	$('.subform').find('input, select').val("");

	switch(type) {
		case 'Infographie':
			$('.update-subform-infographie').show();
			break;
		case 'Plan':
			$('.subform-soustype-plan').show();
			break;
		case 'Piece Comptable':
			$('.subform-soustype-piece-comptable').show();
			break;
		case 'Facture Client':
			$('.subform-societe').show();
			$('.subform-numero').show();
			break;
		case 'Devis Client':
			$('.subform-societe').show();
			$('.subform-numero').show();
			break;
		case 'E-Mailing':
			$('.subform-format-emailing').show();
			$('.subform-bass-de-donnee').show();
			$('.update-subform-infographie').show();
			$('.subform-soustype-infographie').hide();
			$('.subform-objet').show();
			$('.update-subform-emailing').show();
			$('.update-subform-photo').show();
			break;
		case 'Site Internet':
			$('.subform-soustype-site-internet').show();
			break;
		case 'Administratif Divers':
			$('.subform-soustype-administratifs-divers').show();
			break;
		default:
			break;
	}
}

function showSubFormUpdateSousType(value) {
	$('.update-subform-soustype').hide();
	$('.update-nombre-pages').hide();
	$('.update-subform-soustype').find('input').val("");

	switch(value) {
	    case 'Depliant':
	        $('.update-subform-format').show();
	        break;
	    case 'Affiche':
	        $('.update-subform-largeur-longueur').show();
	        break;
	    case 'Bache':
	        $('.update-subform-largeur-longueur').show();
	        break;
	    case 'Carte de Visite':
	        $('.update-subform-largeur-longueur').show();
	        break;
	    case 'Akilux':
	        $('.update-subform-largeur-longueur').show();
        break;
	    case 'Panneau':
	        $('.update-subform-largeur-longueur').show();
	        break;
	    case 'Logo':
	        $('.update-subform-largeur-longueur').show();
	        break;
	    case 'Brochure':
	        $('.update-subform-largeur-longueur').show();
	        $('.update-nombre-pages').show();
	        break;
	    case 'Enveloppes':
	        $('.update-subform-largeur-longueur').show();
	        break;
	    case 'Drapeau':
	        $('.update-subform-largeur-longueur').show();
	        break;
	    case 'Blocs':
	        $('.update-subform-largeur-longueur').show();
	        break;
	    case 'Auto-Collant':
	        $('.update-subform-largeur-longueur').show();
	        break;
	    case 'Chemise':
	        $('.update-subform-largeur-longueur').show();
	        break;
	    case 'E-Mailing':
	        $('.update-subform-emailing').show();
	        break;
	    case 'Site Internet':
	        $('.update-subform-siteinternet').show();
	        break;	
	    case 'Photo':
	        $('.update-subform-photo').show();
	        break;    
	    default:
	        break;
	}
}

function showSubFormUpdateSousTypePlan(value) {
	$('.subform-ville').hide();
	$('.subform-numero').hide();
	$('.subform-mois').hide();

	$('#update-ville').val("");
	$('#update-numero').val("");
	$('#update-mois').val("");

	switch(value) {
		case 'Plan General':
			$('.subform-ville').show();
			break;
		case 'Secteur':
			$('.subform-ville').show();
			$('.subform-numero').show();
			break;
		case 'Plan General Plaintes Ponctuelles':
			$('.subform-ville').show();
			$('.subform-mois').show();
			break;
		case 'Plan General Plaintes Permanentes':
			$('.subform-ville').show();			
			break;
		case 'Secteur Plaintes Permanentes':
			$('.subform-ville').show();
			$('.subform-numero').show();
			break;
		default:
			break;
	}
}

function showSubFormUpdateSousTypePieceComptable(value) {
	$('.subform-societe').hide();
	$('.subform-banque').hide();
	$('.subform-numero').hide();
	$('.subform-mois').hide();

	$('#update-societe').val("");
	$('#update-numero').val("");
	$('#update-banque').val("");
	$('#update-mois').val("");

	switch(value) {
		case 'Facture Fournisseur':
			$('.subform-societe').show();
			$('.subform-numero').show();
			break;
		case 'Releve De Compte':
			$('.subform-societe').show();
			$('.subform-banque').show();
			$('.subform-mois').show();
			break;
		default:
			break;
	}
}

function showSubFormUpdateSousTypeSiteInternet(value) {
	$('.subform-origine').hide();
	$('.subform-sujet').hide();

	$('#update-origine-general').val("");
	$('#update-sujet-general').val("");

	switch(value) {
		case 'Photo':
			$('.subform-origine').show();
			$('.subform-sujet').show();
			break;
		default:
			break;
	}
}

function showSubFormUpdateSousTypeAdministratifsDivers(value) {
	$('.subform-nom, .subform-societe, .subform-piece, .subform-statuts, .subform-assemblees, .subform-descriptif').hide();
	$('.subform-nom, .subform-societe, .subform-piece, .subform-statuts, .subform-assemblees, .subform-descriptif').find('input,select,textarea').val("");

	switch(value) {
		case 'Salarie':
			$('.subform-nom').show();
			$('.subform-societe').show();
			$('.subform-piece').show();
			break;
		case 'Societe':
			$('.subform-nom').show();
			$('.subform-statuts').show();
			$('.subform-assemblees').show();
			break;
		case 'Divers':
			$('.subform-descriptif').show();
			break;
		default:
			break;
	}
}

function appendFormUpdateSousType(documentType, value) {
			
	if(documentType == "Infographie") {							
		switch(value) {
			case 'Depliant':
			$('.update-subform-format').show();
			break;
			case 'Affiche':
			$('.update-subform-largeur-longueur').show();
			break;
			case 'Bache':
			$('.update-subform-largeur-longueur').show();
			break;
			case 'Carte de Visite':
			$('.update-subform-largeur-longueur').show();
			break;
			case 'Akilux':
			$('.update-subform-largeur-longueur').show();
			break;
			case 'Panneau':
			$('.update-subform-largeur-longueur').show();
			break;
			case 'Logo':
			$('.update-subform-largeur-longueur').show();
			break;
			case 'Brochure':
			$('.update-subform-largeur-longueur').show();
			$('.update-nombre-pages').show();
			break;
			case 'Enveloppes':
			$('.update-subform-largeur-longueur').show();
			break;
			case 'Drapeau':
			$('.update-subform-largeur-longueur').show();
			break;
			case 'Blocs':
			$('.update-subform-largeur-longueur').show();
			break;
			case 'Auto-Collant':
			$('.update-subform-largeur-longueur').show();
			break;
			case 'Chemise':
			$('.update-subform-largeur-longueur').show();
			break;
			case 'E-Mailing':
			$('.update-subform-emailing').show();
			break;
			case 'Site Internet':
			$('.update-subform-siteinternet').show();
			break;	
			case 'Photo':
			$('.update-subform-photo').show();
			break;    
			default:
			break;
		}
	} else if(documentType == "Plan") {
		switch(value) {
			case 'Plan General':
			$('.subform-ville').show();
			break;
			case 'Secteur':
			$('.subform-ville').show();
			$('.subform-numero').show();
			break;
			case 'Plan General Plaintes Ponctuelles':
			$('.subform-ville').show();
			$('.subform-mois').show();
			break;
			case 'Plan General Plaintes Permanentes':
			$('.subform-ville').show();			
			break;
			case 'Secteur Plaintes Permanentes':
			$('.subform-ville').show();
			$('.subform-numero').show();
			break;
			default:
			break;
		}
	} else if(documentType == "Piece Comptable") {
		switch(value) {
			case 'Facture Fournisseur':
			$('.subform-societe').show();
			$('.subform-numero').show();
			break;
			case 'Releve De Compte':
			$('.subform-societe').show();
			$('.subform-banque').show();
			$('.subform-mois').show();
			break;
			default:
			break;
		}
	} else if(documentType == "Site Internet") {
		switch(value) {
			case 'Photo':
			$('.subform-origine').show();
			$('.subform-sujet').show();
			break;
			default:
			break;
		}
	} else if(documentType == "Administratif Divers") {
		switch(value) {
			case 'Salarie':
			$('.subform-nom').show();
			$('.subform-societe').show();
			$('.subform-piece').show();
			break;
			case 'Societe':
			$('.subform-nom').show();
			$('.subform-statuts').show();
			$('.subform-assemblees').show();
			break;
			case 'Divers':
			$('.subform-descriptif').show();
			break;
			default:
			break;
		}
	}
}

function submitFormUpdate() {
	$(".overlay").show();

	var formData = new FormData($('.UpdateMetaData')[0]);

	formData.append('client-name', $('#update-clientName option:selected').text());
	formData.append('devis-name', $('#update-devis option:selected').text());
	formData.append('facture-name', $('#update-facture option:selected').text());
	formData.append('createdby-name', $('#update-createdby option:selected').text());
	formData.append('uploadedby-name', $('#update-uploadedby option:selected').text());

	$.ajax({
		url: $('.UpdateMetaData').attr("action") + '/' + paramId,
		type: 'POST',
		dataType: 'json',
		data: formData,
		async: true,
		success: function (data) {
			$(".overlay").hide();
			if(data.status) {
				window.location.href = "<?php echo site_url('ged');?>";
			} else {
				location.reload();
			}
			//console.log("success") 
		},
		error: function() {
			$(".overlay").hide();
			location.reload();
			//console.log("error")
		},
		cache: false,
		contentType: false,
		processData: false
	});		
}

$(document).ready(function() {		
	generateUserComboboxUpdate(function() {
		generateClientComboboxUpdate(function() {
			appendDataFormUpdate();
		});		
	});

	$('.cancel-update').click(function() {
		$('.UpdateMetaData').dialog('close');
		resetFormUpdateMetadataUpload();
	});

	$('#update-clientName').change(function(e) {
		generateDevisComboboxUpdate();
	});

	$('#update-devis').change(function(e) {
		generateFacturesComboboxUpdate();
	});	

	//subtree form structure
	$('#update-typedocument').change(function(){
		var documentType = $(this).val();
		
		showSubFormUpdateDocumentType(documentType);
	});
	$('#update-soustype').change(function(){
		var sousType = $(this).val();	
		console.log(sousType);	
		showSubFormUpdateSousType(sousType);
	});

	$('#update-soustype-plan').change(function(e) {		
		showSubFormUpdateSousTypePlan($(this).val());
	});

	$('#update-soustype-piece-comptable').change(function(e) {		
		showSubFormUpdateSousTypePieceComptable($(this).val());
	});

	$('#update-soustype-site-internet').change(function(e) {		
		showSubFormUpdateSousTypeSiteInternet($(this).val());
	});

	$('#update-soustype-administratifs-divers').change(function(e) {		
		showSubFormUpdateSousTypeAdministratifsDivers($(this).val());
	});

	$('.do-update').click(function(e) {
		submitFormUpdate();
	});

	$('#test-move').click(function(e) {
		testMoveFile();
	});
});
</script>