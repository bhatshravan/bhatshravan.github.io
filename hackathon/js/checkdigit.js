
function checkdigit(products){

	var e = products;
	e=e-1
	var a = new Array (9);

	var s = ['L', 'P', 'R', 'S' ];

	for( var i = 0; i<8 ; i++)
    {
	   a[i] = Math.floor(Math.random()*10);
    }

var b = [];
b[0] = a[0]*8;
b[1] = a[1]*6;
b[2] = a[2]*4;
b[3] = a[3]*2;
b[4] = a[4]*3;
b[5] = a[5]*5;
b[6] = a[6]*9;
b[7] = a[7]*7;

var sum = 0;
for( var i = 0; i<8; i++)
{
	sum += b[i];
}

var reminder  = sum%11;

if(reminder==0)
	a[8] = 5;
if(reminder == 1)
	a[8] = 0;
else a[8] = 11 - reminder;


var upu = s[e] + 'K' + a.join("") + "IN"


return upu

}





