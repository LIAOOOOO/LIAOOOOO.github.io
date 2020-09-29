var state = ["Alabama","Alaska","Arizona","Arkansas","California",
"Colorado","Connecticut","Delaware","Florida","Georgia",
"Hawaii","Idaho","Illinois","Indiana","Iowa",
"Kansas","Kentucky","Louisiana","Maine","Maryland",
"Massachusetts","Michigan","Minnesota","Mississippi","Missouri",
"Montana","Nebraska","Nevada","New Hampshire","New Jersey",
"New Mexico","New York","North Carolina","North Dakota","Ohio",
"Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina",
"South Dakota","Tennessee","Texas","Utah","Vermont",
"Virginia","Washington","WestVirginia","Wisconsin","Wyoming"];
var height=[2.291288,3.834058,3.929377,6.236986,6.637771,7.355270,8.027453,8.537564,10.860018,11.456439,12.424975,12.614278,12.775367,13.044922,13.297368,13.349157,13.896043,14.501034,15.407790,15.454449,15.630099,15.890249,16.976749,18.264994,19.437592,19.904271,21.167192,22.366046,22.766642,24.894377,25.093027,28.635118,29.250641,31.477135,31.620405,32.718802,36.734861,36.847931,38.527912,41.487950,48.725148,53.593376,57.271022,64.993615,68.762272,87.326342,102.861557,168.611417,293.622751];

var ntree =[
[-1,-1,18,8,-1,2,[24,40]],
[-1,-1,-1,[24,40],8,[1,18]],
[-1,-1,31,20,-1,5,-1,[13,22,28,32]],
[-1,-1,42,25,-1,10,[6,43]],
[-1,-1,-1,-1,[13,20,22,28,32],[3,31]],
[-1,-1,43,10,-1,25,[4,42]],
[-1,-1,38,-1,[35,44],-1,[12,27],[14,16,17,26]],
[-1,-1,-1,[1,18],2,[24,40]],
[-1,-1,33],
[-1,-1,-1,[6,43],25,[4,42]],
[-1,-1,-1,23,49,[15,29]],
[-1,-1,-1,[14,16],27,[17,26],[7,35,38,44]],
[-1,-1,32,-1,[5,22,28],-1,20,[3,31]],
[-1,-1,16,12,-1,27,[17,26],[7,35,38,44]],
[-1,-1,29,49,23,11],
[-1,-1,14,12,-1,27,[17,26],[7,35,38,44]],
[-1,-1,26,27,-1,12,[14,16],[7,35,38,44]],
[-1,-1,1,8,-1,2,[24,40]],
[-1,-1,41,48,-1,[34,45]],
[-1,-1,-1,[3,31],5,-1,[13,22,28,32]],
[-1,-1,30,47,-1,[39,50],37,[36,46]],
[-1,-1,28,-1,[5,13,32],-1,20,[3,31]],
[-1,-1,-1,[11,49],[15,29]],
[-1,-1,40,2,-1,8,[1,18]],
[-1,-1,-1,[4,42],10,[6,43]],
[-1,-1,17,27,-1,12,[14,16],[7,35,38,44]],
[-1,-1,-1,[17,26],12,[14,16],[7,35,38,44]],
[-1,-1,22,-1,[5,13,32],-1,20,[3,31]],
[-1,-1,15,49,23,11],
[-1,-1,21,47,-1,[39,50],37,[36,46]],
[-1,-1,3,20,-1,5,-1,[13,22,28,32]],
[-1,-1,13,-1,[5,22,28],-1,20,[3,31]],
[-1,-1,9],
[-1,-1,45,-1,48,[19,41]],
[-1,-1,44,-1,[7,38],-1,[12,27],[14,16,17,26]],
[-1,-1,46,37,50,-1,[39,47],[21,30]],
[-1,-1,-1,[36,46,50],-1,[39,47],[21,30]],
[-1,-1,7,-1,[35,44],-1,[12,27],[14,16,17,26]],
[-1,-1,-1,-1,[47,50],[21,30,37],[36,46]],
[-1,-1,24,2,-1,8,[1,18]],
[-1,-1,19,48,-1,[34,45]],
[-1,-1,4,25,-1,10,[6,43]],
[-1,-1,6,10,-1,25,[4,42]],
[-1,-1,35,-1,[7,38],-1,[12,27],[14,16,17,26]],
[-1,-1,34,-1,48,[19,41]],
[-1,-1,36,37,50,-1,[39,47],[21,30]],
[-1,-1,-1,[21,30],[39,50],37,[36,46]],
[-1,-1,-1,[19,41],[34,45]],
[-1,-1,-1,[15,23,29],11],
[-1,-1,-1,37,[36,39,46,47],[21,30]]
];

function progress(){
	var dis = document.form.dis.value;
	var target = document.form.target.value;
	var output=""
    var tindex = -1;
    var myNewArray = [];
    var rsort = [];
    var str = "";



  


    /*----------------- Your Code Start-------------*/
    for ( var j = 0; j <= 49; j++) {
    	if(state[j] == target)
    		tindex = j;
    }
    if(tindex == -1)
        document.write("The state is not exist!<br>");

    
    for(var j=0; j <= dis; j++)
    {
    	
    	if(ntree[tindex][j] != -1 && ntree[tindex][j] != undefined){
    		if(j != dis)
    		{
                if(ntree[tindex][j+1] == undefined)
                {
                    str = str + ntree[tindex][j] ;
                }
                else
                {
                    str = str + ntree[tindex][j] + ',';
                }
    			
    		}

    		if(j == dis )
    		{
    			str = str + ntree[tindex][j] ;
    		}
    		
    	}
    }
    
    //document.write(str+"<br>");
    if(str[(str.length-1)] == ','){
        str = str.substring(0, str.length-1);  //1234567
    }
    var strs= []; //定義一陣列
    strs=str.split(' , '); //字元分割
    var temp = new Array();
    // this will return an array with strings "1", "2", etc.
    temp = str.split(",");
 
   

    for (a in temp ) {
        temp[a] = parseInt(temp[a], 10); // Explicitly include base as per Álvaro's comment
    }


    temp.sort(function (a, b) {
        return a - b});

    
     for (a in temp ) {
     	
     	if(a == (temp.length-1))
     	{
     		output += state[temp[a]-1];
     	}
     	else
     	{
     	   output = output + state[temp[a]-1] + ", ";
     	}

    }
    if(str == "")
        document.write("NONE<br>");
    else
        document.write(output+"<br>");
   

    /*----------------- Your Code End --------------*/
    document.getElementById('out').innerHTML= output;
}
