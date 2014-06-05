$("th#itemname[colspan=2]").attr('colspan',1);

// Hide  view past chat sessions
$("div#enterlink p:contains('View past chat sessions')").hide();
// Change everyone can view past session to YES
$("select#id_studentlogs").val('1');
// Hide  Chat Session Frame
$("fieldset#id_sessionshdr.clearfix.collapsible").hide();


// THIS IS FOR BADGE CRITERIA
$("#id_first_header label:contains('CLE Teacher')").prev('input[type=checkbox]').prop( "checked", true ); // label:contains('CLE Teacher')
$("fieldset .felement.fgroup:contains('Manager')").remove();

// $("fieldset .felement.fgroup:contains('CLE Teacher')").show();
$("fieldset .felement.fgroup:contains('CLE')").css('visibility', 'visible');
// $("fieldset .felement.fgroup:contains(\"Teacher\")").remove();



$("div [id*='fitem_id_limit']").hide();

// Hide General on Subject Navigation
$("li.type_structure:contains('General')").hide();
// Hide Random Short-Answer Matching on pop-up choice
$("div.qtypeoption:contains('Random short-answer matching')").hide();

// Edit Summary Title in course page change to "Edit"
$("img.iconsmall.edit").prop('title','Edit');

// Change Section name to Lesson Title
$("form#mform1.mform fieldset#id_generalhdr.clearfix.collapsible div.fitemtitle div.fgrouplabel label").text("Lesson Title");
$("form#mform1.mform fieldset#id_generalhdr.clearfix.collapsible div#fitem_id_summary_editor.fitem.fitem_feditor div.fitemtitle label").text("Description/Instruction");
$("form#mform1.mform fieldset#id_generalhdr.clearfix.collapsible div#fitem_id_summary_editor.fitem.fitem_feditor div.fitemtitle span.helptooltip").hide();

// For Calendar
$("div.bottom").remove();

// For Quiz Page 
//$("div#region-bs-main-and-pre div.row-fluid div h2").toUpperCase();


$("a[title='My Learning Wall']").click(function(){ 
$("#region-main").fadeOut();   
$("#learningwall" ).show( "slow" );
$("#learningwallcontent").show("slow");
});

// hide grade category except on editing quiz page
$( "fieldset#id_modstandardgrade" ).hide();
$( "fieldset#id_modstandardgrade" ).has( "div#fitem_id_attempts" ).css( "display", "" );

