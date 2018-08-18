var horario = new Date();
var hora = horario.getHours();
var exibe = '<link rel="stylesheet" href="css/noite.css" />';
if ((hora >= 6) && (hora < 12)) {
	exibe = '<link rel="stylesheet" href="css/dia.css" />';
} else if ((hora >=12) && (hora < 19)) {
	exibe = '<link rel="stylesheet" href="css/tarde.css" />';
}
document.write(exibe);