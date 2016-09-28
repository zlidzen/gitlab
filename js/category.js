function table_build(){
var n = document.form1.n.value;
var i;
document.getElementById('matter').innerHTML = '<tr><td>N п\\п</td><td>Масса вещества, G<sub>i</sub>, кг.:</td><td>Низшая теплота сгорания вещества, Q<sub>i</sub>, МДж/кг.:</td></tr>';
for (i = 0; i < n; i++) {
  document.getElementById('matter').innerHTML += '<tr><td>' +(i+1)+'</td><td><input placeholder="0" type="number" id="m'+i+'" ></td><td><input placeholder="0" type="number" id="q'+i+'"></td></tr>';}
}

function calculate() {

var i,g,Q,Qi,Gi,strError,lpr;
var n = document.form1.n.value;
var H = document.form1.h.value;
var S = document.form1.s.value;
var q = document.form1.q.value;
var l = document.form1.l.value;

lpr = 0;
g=0;
Q=0;
Gi=0;
Qi=0;
Qb=0;

if (l<0)
{  document.getElementById('summ').innerHTML ='<p>ERROR! Предельное расстояние между участками должно быть больше нуля!</p>';return 1;}

if (q<0)
{  document.getElementById('summ').innerHTML ='<p>ERROR! Критическая плотность падающих лучистых потоков должна быть больше нуля!</p>';return 1;}

if (H<=0)
{  document.getElementById('summ').innerHTML ='<p>ERROR! Минимальное расстояние от поверхности пожарной нагрузки до перекрытия должна быть больше нуля!</p>';return 1;}

if (S<=0)
{  document.getElementById('summ').innerHTML ='<p>ERROR! Площадь участка должна быть более 0 м<sup>2</sup>!</p>';return 1;}

if ((n>=100)||(n<=0))
{  document.getElementById('summ').innerHTML ='<p>ERROR! Количество веществ должно быть от 0 до 100.!</p>';return 1;}

for (i=0;i<n ;i++ ) {
		var elem = document.getElementById('m'+i); 
 		 Gi = elem.value;
		var elem = document.getElementById('q'+i); 
 		 Qi = elem.value;	
if ((Gi<=0)||(Qi<=0))
{document.getElementById('summ').innerHTML ='<p>ERROR! Данные о веществах введены неверно!</p>';return 1;}	
Q += Gi*Qi;
}

document.getElementById('summ').innerHTML ='<p>Пожарная нагрузка Q = '+Q.toFixed(3)+' МДж</p>';
g=Q/S;
document.getElementById('summ').innerHTML +='<p>Удельная пожарная нагрузка g = '+g.toFixed(3)+' МДж/м<sup>2</sup></p>';

if (g > 2200)
{
  document.getElementById('summ').innerHTML +='<p>Категория участка: В1</p>';
  document.getElementById('notific').innerHTML +='<p>Способ размещения на участке: Не нормируется.</p>';
}

if ((g<=2200)&&(g>1400))
{
document.getElementById('summ').innerHTML +='<p>Предварительная категория участка: В2</p>';
Qb=0.64*2200*H*H;
 
 if (Q >= Qb)
	{
	document.getElementById('summ').innerHTML +='<p>Уточненная категория участка: В1</p>';
	document.getElementById('notific').innerHTML +='<p>Способ размещения на участке: Не нормируется.</p>';
	}
	else{document.getElementById('summ').innerHTML +='<p>Уточненная категория участка: В2</p>';}
}

if ((g<=1400)&&(g>200))
{
document.getElementById('summ').innerHTML +='<p>Предварительная категория участка: В3</p>';
Qb=0.64*1400*H*H;

  if (Q >= Qb){
	document.getElementById('summ').innerHTML +='<p>Уточненная категория участка: В2</p>';
	}
	else{document.getElementById('summ').innerHTML +='<p>Уточненная категория участка: В3</p>';}
}

if ((g<=200)&&(g>100))
{
// q l
if(q<=5){lpr = 12;}
if((q>5)&&(q<=10)){lpr = 8;}
if((q>10)&&(q<=15)){lpr = 6;}
if((q>15)&&(q<=20)){lpr = 5;}
if((q>20)&&(q<=25)){lpr = 4;}
if((q>25)&&(q<=30)){lpr = 3,8;}
if((q>30)&&(q<=40)){lpr = 3,2;}
if((q>40)&&(q<=50)){lpr = 2,8;}

if(H < 11){lpr = lpr + (11- H);}

document.getElementById('summ').innerHTML +='<p>Предельное расстояние l = '+lpr.toFixed(3)+' м.</p>';

if (S<=10){ 
	document.getElementById('summ').innerHTML +='<p>Категория участка: В4</p>';
	if(lpr > l){document.getElementById('summ').innerHTML +='<p>Уточненная категория участка: В3</p>';}
	}
}
document.getElementById('summ').innerHTML +='<p>Категория участка: В3</p>';

if (g<=100){
  document.getElementById('summ').innerHTML +='<p>Категория участка: Г1, Г2 или Д</p>';
}
}