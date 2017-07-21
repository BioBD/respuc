imgesqati = "imagens/abaesquerda.png";
imgesqdes = "imagens/abaesquerda_desativa.png";
imgdirati = "imagens/abadireita.png";
imgdirdes = "imagens/abadireita_desativa.png";

abaAtiva = 1;


function disciplinaSwitch(codigo)
{
	conteudo = document.getElementById('disciplina'+codigo);
	if (conteudo.style.display == "none") conteudo.style.display = 'block';
	else conteudo.style.display = 'none';
	
}

function disciplinasSwitch(curso)
{
	conteudo = document.getElementById('disciplinas'+curso);
	if (conteudo.style.display == "none") conteudo.style.display = 'block';
	else conteudo.style.display = 'none';
	
}

function displayID(id)
{
	alert("1");
	
	conteudo = document.getElementById(id);
	if (conteudo) conteudo.style.display = "block";
}

function ativarAba(num) 
{
	document.getElementById("aba"+num+"int").className = "abaintati";
	
	if (abaAtiva != num) desativarAba(abaAtiva);
	abaAtiva = num;	
	
	conteudo = document.getElementById("conteudo"+num);
	if (conteudo) conteudo.style.display = "block";
}

function desativarAba(num)
{
	document.getElementById("aba"+num+"int").className = "abaintdes";
	
	conteudo = document.getElementById("conteudo"+num);
	 if (conteudo) conteudo.style.display = "none";
}

function verNoticia(id)
{	
	document.getElementById("aba2int").className = "abaintdes";
	
	document.getElementById("conteudo2").innerHTML = "Carregando...";
	loadHTMLdata("?not="+id);	
	
	ativarAba(2);
	desativarAba(1);
}

function verLaboratorio(id)
{	
	document.getElementById("aba2int").className = "abaintdes";
	
	document.getElementById("conteudo2").innerHTML = "Carregando...";
	loadHTMLdata("?lab="+id);	
	
	ativarAba(2);
	desativarAba(1);
}

function verEstagio(id)
{	
	document.getElementById("aba2int").className = "abaintdes";
	
	document.getElementById("conteudo2").innerHTML = "Carregando...";
	loadHTMLdata("?est="+id);	
	
	ativarAba(2);
	desativarAba(1);
}

function verEvento(id)
{	
	document.getElementById("aba2int").className = "abaintdes";
	
	document.getElementById("conteudo2").innerHTML = "Carregando...";
	loadHTMLdata("?eve="+id);	
	
	ativarAba(2);
	desativarAba(1);
}

var htmlData, main, ua, ie, x, div, elem;

function alterarNoticia()
{
	if ( htmlData.readyState == 4 && htmlData.status == 200)
	{
		document.getElementById("conteudo2").innerHTML = htmlData.responseText;
	}
}

function updateDiv() {

div = ( document.all ) ? document.all.myDiv : document.getElementById("myDiv");
main = htmlData.responseXML.documentElement.getElementsByTagName("body")[0];
elem = main.getElementsByTagName("div");
   if ( htmlData.readyState !== 4 ) return;
   if ( htmlData.status !== 200 ) {
      alert("Unable to parse data!\nPlease ensure that the file has a valid path.");
  }
   for ( x = 0; x < elem.length; x++ ) {
      try {
          div.innerHTML += elem[x].outerHTML; 
      }
      catch( e ) {
         alert("Unable to load request!");
      }
   }
}

function loadHTMLdata( url ) {
	htmlData = null;
	ie = navigator.userAgent.toLowerCase().indexOf("msie");
	if ( window.XMLHttpRequest ) htmlData = new XMLHttpRequest();
	else if (( ie !== -1 ) && (/MSIE[\s\/](\d+\.\d+)/.test( navigator.userAgent))) {
	   try {
		  /** IE 5 */
		  ver = new Number( RegExp.$1 );	  
		  htmlData = ( ver < 6 ) ? new ActiveXObject("Microsoft.XMLHTTP") : new ActiveXObject("Msxml2.XMLHTTP");
		  } 
		catch( e ) {
		  htmlData = new XMLHttpRequest();
		  }
	}
	if ( htmlData !== null ) {
		htmlData.onreadystatechange = alterarNoticia;

		htmlData.open("GET", url, true);
		htmlData.send( null );
	}
}
