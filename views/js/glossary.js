/*=====================
SEE GLOSSARY
======================*/


$(".btnSeeGlossary").click(function() {
    let idGlossary = $(this).attr("idGlossary");
    window.location = "glossary?id=" + idGlossary;


})