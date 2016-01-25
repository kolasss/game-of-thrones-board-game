var turn;
var faza;
var win;
var throne = new Array();
var fiefdom = new Array();
var court = new Array();
var wildpower;
var wildcard;
var WC1 = new Array();
var WC2 = new Array();
var WC3 = new Array();
var units = new Object();
var houses = new Object();
var myhouse;
var mycontrol;
var terr;
var house;
var orders = new Array();
var maxspecial;
var mycourt;
var currentplayer;
var starting = 0;
var target;
var karta = new Object();
var karta2 = new Object();
var army = new Array();
var battle = new Object();
var WAconseq = new Object();
var hordezamki = new Array();

//sorting 0 to end of array
function compare(a, b) {
	if (a == 0) {return 1}
	return 0;
}
//clonning function
function cloneObj(obj) { 
  var ret = {}; 
  for ( var k in obj ) 
    ret[k] = obj[k]; 
  return ret; 
}

//O win
function Owin(){
	alert("O Wins!");
	$.get('php/game_win.php',{id:game_id, win:"1"});
	win = 1;
};

//X win
function Xwin(){
	alert("X Wins!");
	$.get('php/game_win.php',{id:game_id, win:"2"});
	win = 2;
};
//determine winner
function winner(){
	if (win==0){
		 
	}
};

//select data from bd function
function initialize() {
	$.getJSON('php/game_sel.php', {id: game_id}, function(row){
		turn = parseInt(row.turn);
		$('#turn').html(turn+1);
		faza = parseInt(row.faza);
		if (faza == 0) {
			$('#phase').html('Westeros Card 1');
			$('#now').html('updating...');
		} else if (faza == 1) {
			$('#phase').html('Westeros Card 2');
			$('#now').html('updating...');
		} else if (faza == 2) {
			$('#phase').html('Westeros Card 3');
			$('#now').html('updating...');
		} else if (faza == 3) {
			$('#phase').html('Planning');
			$('#now').html('All');
		} else if (faza == 4) {
			$('#phase').html('Raven');
			$('#now').html('Raven holder');
		} else if (faza == 5) {
			$('#phase').html('Raids');
			$('#now').html('updating...');
		} else if (faza == 6) {
			$('#phase').html('Marches');
			$('#now').html('updating...');
		} else if (faza == 7) {
			$('#phase').html('Call for support');
			$('#now').html('updating...');
		} else if (faza == 8) {
			$('#phase').html('Choose House Card');
			$('#now').html('Attacking and defending lords');
		} else if (faza == 9) {
			$('#phase').html('Reveal House Cards');
			$('#now').html('Attacking and defending lords');
		} else if (faza == 10) {
			$('#phase').html('Valyrian Steel Blade');
			$('#now').html('Valyrian Steel Blade holder');
		} else if (faza == 11) {
			$('#phase').html('Combat resolution');
			$('#now').html('Loser');
		} else if (faza == 12) {
			$('#phase').html('Retreat');
			$('#now').html('updating...');
		} else if (faza == 13) {
			$('#phase').html('Clean Up');
			$('#now').html('updating...');
		} else if (faza == 14) {
			$('#phase').html('Consolidate Powers');
			$('#now').html('updating...');
		} else if (faza == 15) {
			$('#phase').html('Call for support');
			$('#now').html('updating...');
		} else if (faza == 16 || faza == 18) {
            $('#phase').html('Reveal Wildling Card');
            $('#now').html('updating...');
        } else if (faza == 17 || faza == 19) {
            $('#phase').html('Wildling attack consequences');
            $('#now').html('updating...');
        };
		 
		win = row.win;
		winner();
		
		//players house
		if (user_login == row.Stark){
			myhouse = 'Stark';
			mycontrol = 'S';
		} else if (user_login == row.Greyjoy){
			myhouse = 'Greyjoy';
			mycontrol = 'G';	
		} else if (user_login == row.Lannister){
			myhouse = 'Lannister';	
			mycontrol = 'L';
		} else if (user_login == row.Martell){
			myhouse = 'Martell';
			mycontrol = 'M';	
		} else if (user_login == row.Tyrell){
			myhouse = 'Tyrell';
			mycontrol = 'T';
		} else if (user_login == row.Baratheon){
			myhouse = 'Baratheon';
			mycontrol = 'B';
		};
				
		currentplayer = row.currentplayer;
		
		//influence track setup
		for (i=0; i<6; i++){
			throne[i] = eval('row.throne'+(i+1));
			fiefdom[i] = eval('row.fiefdom'+(i+1));
			court[i] = eval('row.court'+(i+1));
		}
		
		i=0;
		$('#track table tr:eq(0) td').each(function() {
			$(this).html('<div class="' + throne[i] + '-track token"></div>');
			i++;
		});
		i=0;
		$('#track table tr:eq(1) td').each(function() {
			$(this).html('<div class="' + fiefdom[i] + '-track token"></div>');
			i++;
		});
		i=0;
		$('#track table tr:eq(2) td').each(function() {
			$(this).html('<div class="' + court[i] + '-track token"></div>');
			i++;
		});
		
		//uniq tokens setup
		$('#'+throne[0]+'-throne').show();
		$('#'+fiefdom[0]+'-blade').show();
		$('#'+court[0]+'-raven').show();
		
		//max special orders and raven and blade
		for (i=0; i<6; i++){
			if (court[i] == myhouse) {
				mycourt = i;
			}
		}
		if (mycourt < 2) {maxspecial = 3} else {
			if (mycourt == 2) {maxspecial = 2} else {
				if (mycourt == 3) {maxspecial = 1} else {
					maxspecial = 0;
				}
			}
		}
		blade = row.Blade;
		if (blade == 1) {
			$('#'+fiefdom[0]+'-blade').addClass('discarded');
		}
		//wildlingpower setup
		wildpower = parseInt(row.WildPower);
        $('#wildpower td').html('');
		$('#wildpower td:eq('+wildpower+')').html('<div id="wildtoken"></div>');
		
		if (faza == 4 || faza == 2 || faza == 17) {
			wildcard = row.WildCard1;
		}
		
		//westeros card setup
		WC1[0] = 'I';
		WC2[0] = 'II';
		WC3[0] = 'III';
		for (i=1; i<11; i++){
			WC1[i] = eval('row.WC1_'+i);
			WC2[i] = eval('row.WC2_'+i);
			WC3[i] = eval('row.WC3_'+i);
		}
		i=1;
		$('#WCards td').each(function() {
			if (turn != 0) {
				//WC1
				if (i==1) {
					if (eval('WC'+i+'['+turn+']') == 0) {
						$(this).html('Last Days of Summer');
					} else if (eval('WC'+i+'['+turn+']') == 1) {
						$(this).html('Mustering');
					} else if (eval('WC'+i+'['+turn+']') == 2) {
						$(this).html('Supply');
					} else if (eval('WC'+i+'['+turn+']') == 3) {
						$(this).html('Throne of Blades');
					} else if (eval('WC'+i+'['+turn+']') == 4) {
						$(this).html('Winter is Coming');
					};
				} else if (i==2) {
					if (eval('WC'+i+'['+turn+']') == 0) {
						$(this).html('Clash of Kings');
					} else if (eval('WC'+i+'['+turn+']') == 1) {
						$(this).html('Dark Wings, Dark Words');
					} else if (eval('WC'+i+'['+turn+']') == 2) {
						$(this).html('Game of Thrones');
					} else if (eval('WC'+i+'['+turn+']') == 3) {
						$(this).html('Last Days of Summer');
					} else if (eval('WC'+i+'['+turn+']') == 4) {
						$(this).html('Winter is Coming');
					};
				} else if (i==3) {
					if (eval('WC'+i+'['+turn+']') == 0) {
						$(this).html('Feast for Crows');
					} else if (eval('WC'+i+'['+turn+']') == 1) {
						$(this).html('Put to the Sword');
					} else if (eval('WC'+i+'['+turn+']') == 2) {
						$(this).html('Rains of Autumn');
					} else if (eval('WC'+i+'['+turn+']') == 3) {
						$(this).html('Sea of Storms');
					} else if (eval('WC'+i+'['+turn+']') == 4) {
						$(this).html('Storm of Swords');
					} else if (eval('WC'+i+'['+turn+']') == 5) {
						$(this).html('Web of Lies');
					} else if (eval('WC'+i+'['+turn+']') == 6) {
						$(this).html('Wildlings Attack');
					};
				};
			} else {
				$(this).html(eval('WC'+i+'['+turn+']'));
			};
			i++;
		});
		
		//tables names
		terr = row.terr;
		house = row.house;
		
		//objects on map setup
		mapsetup();
		
		//houses info setup
		housesinfo();
		
		//karta setup
		$.getJSON('php/karta.php', function(json){karta=json;});

        //player names
        $('#Sinfo').html('');
        $('#Ginfo').html('');
        $('#Linfo').html('');
        $('#Minfo').html('');
        $('#Tinfo').html('');
        $('#Binfo').html('');
        if (row.Stark != 0) {
            $('#Sinfo').html(row.Stark);
        };
        if (row.Greyjoy != 0) {
            $('#Ginfo').html(row.Greyjoy);
        };
        if (row.Lannister != 0) {
            $('#Linfo').html(row.Lannister);
        };
        if (row.Martell != 0) {
            $('#Minfo').html(row.Martell);
        };
        if (row.Tyrell != 0) {
            $('#Tinfo').html(row.Tyrell);
        };
        if (row.Baratheon != 0) {
            $('#Binfo').html(row.Baratheon);
        };
	});
};

//current orders function
function currentorders(){
	for (i=0; i<13; i++) {orders[i] = 0;}
	for (name in units) {
		var tempval = eval(units[name]);
		if (tempval.control == mycontrol && tempval.unit1 !=0) {
			orders[tempval.prikaz]++;
			if (tempval.prikaz > 6) {orders[12]++};
		};
	};
    if ((eval('WC3['+turn+']') == 4 || eval('WC3['+turn+']') == 0 || eval('WC3['+turn+']') == 3 || eval('WC3['+turn+']') == 5) && orders[0] > 12) {
        orders[0] = 12;
    } else if (eval('WC3['+turn+']') == 2 && orders[0] > 14) {
        orders[0] = 14;
    } else if (orders[0] > 15) {
        orders[0] = 15;
    }
};

//objects on map setup
function mapsetup() {
	$.getJSON('php/game_terr.php', {table:terr, mycontrol:mycontrol, id: game_id}, function(json){
		units = json;
		$('#board .land').each(function() {
			$(this).html('');
			var tempval = 'units.'+$(this).attr("id")+'.';
			var house = eval('units.'+$(this).attr("id")+'.control');
			placeunit(tempval, $(this).attr("id"), house);
			placegar(tempval, $(this).attr("id"));
			placetoken(tempval, $(this).attr("id"), house);
		});
		$('#board .water').each(function() {
			$(this).html('');
			var tempval = 'units.'+$(this).attr("id")+'.';
			var house = eval('units.'+$(this).attr("id")+'.control');
			placeunit(tempval, $(this).attr("id"), house);
		});
		//current count of orders
		currentorders();
	});
}

//houses info setup function
function housesinfo() {
	$.getJSON('php/game_house.php', {table:house}, function(json){
		houses = json;
		//victory track
		i = 1;
		$('#zamki td').each(function(){
			$(this).html('');
			for (name in houses) {
				var tempval = eval(houses[name]);
				if (tempval.zamki == i) {
					$(this).append('<div class="'+ name +'-s supply"></div>');
				};
			}
			i++;
		});
		
		//supply track
		i = 0;
		$('#bochki td').each(function(){
			$(this).html('');
			for (name in houses) {
				var tempval = eval(houses[name]);
				if (tempval.bochki == i) {
					$(this).append('<div class="'+ name +'-s supply"></div>');
				};
			}
			i++;
		});
		
		//tokens in hand
		for (name in houses) {
			var tempval = eval(houses[name]);
			$('#'+ name +'PT').html(tempval.tokih);
			
			i = 1;
			$('#'+ name +'HC li').each(function(){
				$(this).removeClass('discarded');
				if (eval('tempval.HC'+i) == 0) {
					$(this).addClass('discarded');
				}
				i++;
			});
		}
		//Ready button visibility and setup
		if (faza == 3) {
			loadReady();
		} else if (faza == 6 && eval('houses.'+myhouse+'.ready') == 1) { //if player already uses 1 march order this phase
			currentplayer = 0;
			$.get('php/player_notready.php',{table: house, myhouse: myhouse, id: game_id});
			$.get('php/march_next.php',{table: terr, id: game_id});
		} else if (faza == 14 && eval('houses.'+myhouse+'.ready') == 1) { //if player already upgrades 1 unit this phase
			currentplayer = 0;
			$.get('php/consolidate_next.php',{terr: terr, id: game_id, house: house, myhouse: myhouse});
		}
	});
}

//determine unit
function detunit(data, id, unit, house) {
	//footman
	if (eval(data+unit)=='F1') {
		$("#"+id).append('<div class="'+ house +'F1 footman"></div>');
	} else {
		//routed footman
		if (eval(data+unit)=='F0') {
			$("#"+id).append('<div class="'+ house +'F1 footman routed"></div>');
		} else {
			//knight
			if (eval(data+unit)=='K1') {
				$("#"+id).append('<div class="'+ house +'K1 knight"></div>');
			} else {
				//routed knight
				if (eval(data+unit)=='K0') {
					$("#"+id).append('<div class="'+ house +'K1 knight routed"></div>');
				} else {
					//engine
					if (eval(data+unit)=='E1') {
						$("#"+id).append('<div class="'+ house +'E1 engine"></div>');
					} else {
						//routed engine
						if (eval(data+unit)=='E0') {
							$("#"+id).append('<div class="'+ house +'E1 engine routed"></div>');
						} else {
							//ship
							if (eval(data+unit)=='S1') {
								$("#"+id).append('<div class="'+ house +'S1 ship"></div>');
							} else {
								//routed ship
								if (eval(data+unit)=='S0') {
									$("#"+id).append('<div class="'+ house +'S1 ship routed"></div>');
								} 
							}
						}
					}
				}
			}
		}
	}
}


//filling zone with units and orders
function placeunit(data, id, house) {
	//unit1
	if (eval(data+'unit1') !=0) {
		detunit(data, id, 'unit1', house);
		//unit2
		if (eval(data+'unit2') !=0) {
			detunit(data, id, 'unit2', house);
			//unit3
			if (eval(data+'unit3') !=0) {
				detunit(data, id, 'unit3', house);
				//unit4
				if (eval(data+'unit4') !=0) {
					detunit(data, id, 'unit4', house);
				}
			}
		}
		
		if (eval(data+'prikaz') !=0) {
			$("#"+id).append('<div class="order'+ eval(data+'prikaz') +' order">'+eval(data+'prikaz')+'</div>');
		}
		
	}
};

//filling zone with garrisons
function placegar(data, id) {
	if (eval(data+'garrison') !=0) {
		//winterfell
		if (eval(data+'garrison') ==1) {
			$("#"+id).append('<div class="garrison" id="Winterfell-gar">2</div>');
		} else 
		//pyke
		if (eval(data+'garrison') ==2) {
			$("#"+id).append('<div class="garrison" id="Pyke-gar">2</div>');
		} else
		//lannisport
		if (eval(data+'garrison') ==3) {
			$("#"+id).append('<div class="garrison" id="Lannisport-gar">2</div>');
		} else 
		//dragonstone
		if (eval(data+'garrison') ==4) {
			$("#"+id).append('<div class="garrison" id="Dragonstone-gar">2</div>');
		} else 
		//highgarden
		if (eval(data+'garrison') ==5) {
			$("#"+id).append('<div class="garrison" id="Highgarden-gar">2</div>');
		} else 
		//sunspear
		if (eval(data+'garrison') ==6) {
			$("#"+id).append('<div class="garrison" id="Sunspear-gar">2</div>');
		} else 
		//eyrie
		if (eval(data+'garrison') ==7) {
			$("#"+id).append('<div class="garrison" id="Eyrie-gar">6</div>');
		} else 
		//kingslanding
		if (eval(data+'garrison') ==8) {
			$("#"+id).append('<div class="garrison" id="KingsLanding-gar">5</div>');
		}
	}
};

//place tokens
function placetoken(data, id, house) {
	$("#"+id+'-token').html('');
	if (eval(data+'token') ==1) {
		var housename;
		if (house == 'B') {
			housename = 'baratheon';
		} else if (house == 'L') {
			housename = 'lannister';
		} else if (house == 'S') {
			housename = 'stark';
		} else if (house == 'G') {
			housename = 'greyjoy';
		} else if (house == 'M') {
			housename = 'martell';
		} else if (house == 'T') {
			housename = 'tyrell';
		};
			
		$("#"+id+'-token').html('<div class="' + housename + '-pt powertoken"></div>');
	}
};

//autorefresh data from bd
myInterval = setInterval("refresh();", 3000);
var is_interval_running = true; //Optional
function refresh()	{
	if (faza == 0) {
		wc1refresh();
	} else if (faza == 1) {
        wc2refresh();
    } else if (faza == 2) {
        wc3refresh();
    } else if (faza == 3) {
		planningrefresh();
	} else if (faza == 4) {
		ravenrefresh();
	} else if (faza == 5) {
		raidrefresh();
	} else if (faza == 6) {
		marchrefresh();
	} else if (faza == 7) {
		supportrefresh();
	} else if (faza == 8) {
		hcardsrefresh();
	} else if (faza == 9) {
		revealhcrefresh();
	} else if (faza == 10) {
		valyrianrefresh();
	} else if (faza == 11) {
		casualstiesrefresh();
	} else if (faza == 12) {
		retreatrefresh();
	} else if (faza == 13) {
		cleanuprefresh();
	} else if (faza == 14) {
		consolidaterefresh();
	} else if (faza == 15) {
		supneutralrefresh();
	} else if (faza == 16) {
        revealwcrefresh();
    } else if (faza == 17) {
        conseqrefresh();
    } else if (faza == 18) {
        revealwcrefresh2();
    } else if (faza == 19) {
        conseqrefresh2();
    };
	is_interval_running = true;
	
};

//Westeros Card 1 phase refresh
function wc1refresh() {
	$.getJSON('php/game_refresh0.php', {id: game_id}, function(row){
		faza = parseInt(row.faza);
		if (faza == 1) {
			$('#phase').html('Westeros Card 2');
			$('#now').html('updating...');
		} else if (faza == 2) {
			$('#phase').html('Westeros Card 3');
			$('#now').html('updating...');
		} else if (faza == 3) {
			$('#phase').html('Planning');
			$('#now').html('All');
		} else if (faza == 16) {
            $('#phase').html('Reveal Wildling Card');
            $('#now').html('updating...');
        } else if (faza == 17) {
            $('#phase').html('Wildling attack consequences');
            $('#now').html('updating...');
        };
		
		//WC table
		for (i=1; i<11; i++){
			WC1[i] = eval('row.WC1_'+i);
			WC2[i] = eval('row.WC2_'+i);
			WC3[i] = eval('row.WC3_'+i);
		}
		i=1;
		$('#WCards td').each(function() {
			if (turn != 0) {
				//WC1
				if (i==1) {
					if (eval('WC'+i+'['+turn+']') == 0) {
						$(this).html('Last Days of Summer');
					} else if (eval('WC'+i+'['+turn+']') == 1) {
						$(this).html('Mustering');
					} else if (eval('WC'+i+'['+turn+']') == 2) {
						$(this).html('Supply');
					} else if (eval('WC'+i+'['+turn+']') == 3) {
						$(this).html('Throne of Blades');
					} else if (eval('WC'+i+'['+turn+']') == 4) {
						$(this).html('Winter is Coming');
					};
				} else if (i==2) {
					if (eval('WC'+i+'['+turn+']') == 0) {
						$(this).html('Clash of Kings');
					} else if (eval('WC'+i+'['+turn+']') == 1) {
						$(this).html('Dark Wings, Dark Words');
					} else if (eval('WC'+i+'['+turn+']') == 2) {
						$(this).html('Game of Thrones');
					} else if (eval('WC'+i+'['+turn+']') == 3) {
						$(this).html('Last Days of Summer');
					} else if (eval('WC'+i+'['+turn+']') == 4) {
						$(this).html('Winter is Coming');
					};
				} else if (i==3) {
					if (eval('WC'+i+'['+turn+']') == 0) {
						$(this).html('Feast for Crows');
					} else if (eval('WC'+i+'['+turn+']') == 1) {
						$(this).html('Put to the Sword');
					} else if (eval('WC'+i+'['+turn+']') == 2) {
						$(this).html('Rains of Autumn');
					} else if (eval('WC'+i+'['+turn+']') == 3) {
						$(this).html('Sea of Storms');
					} else if (eval('WC'+i+'['+turn+']') == 4) {
						$(this).html('Storm of Swords');
					} else if (eval('WC'+i+'['+turn+']') == 5) {
						$(this).html('Web of Lies');
					} else if (eval('WC'+i+'['+turn+']') == 6) {
						$(this).html('Wildlings Attack');
					};
				};
			} else {
				$(this).html(eval('WC'+i+'['+turn+']'));
			};
			i++;
		});
		//Blade token
		blade = row.Blade;
		$('#'+fiefdom[0]+'-blade').removeClass('discarded');
		
		//wildlingpower setup
		wildpower = parseInt(row.WildPower);
        $('#wildpower td').html('');
		$('#wildpower td:eq('+wildpower+')').html('<div id="wildtoken"></div>');
		
		//Wildling Attack
		if (wildpower == 6) {
            $('#now').html('All');

            if (eval('houses.'+myhouse+'.ready') == 0) {
                clearInterval(myInterval);
                $("#popup2Content").html('<table style="margin-top:10px;" width="400" border="1" align="center"><tr><th colspan="2" scope="col"><p>Wildling Attack!</p></th></tr><tr><td width="250" align="center" valign="middle">Wildlings` Power</td><td align="center" valign="middle">'+(wildpower*2)+'</td></tr><tr><td colspan="2" scope="col" align="center" valign="middle">House`s Power tokens</td></tr><tr><td align="center" valign="middle">Stark</td><td align="center" valign="middle">'+houses.Stark.tokih+'</td></tr><tr><td align="center" valign="middle">Greyjoy</td><td align="center" valign="middle">'+houses.Greyjoy.tokih+'</td></tr><tr><td align="center" valign="middle">Lannister</td><td align="center" valign="middle">'+houses.Lannister.tokih+'</td></tr><tr><td align="center" valign="middle">Baratheon</td><td align="center" valign="middle">'+houses.Baratheon.tokih+'</td></tr><tr><td align="center" valign="middle">Tyrell</td><td align="center" valign="middle">'+houses.Tyrell.tokih+'</td></tr><tr><td align="center" valign="middle">Martell</td><td align="center" valign="middle">'+houses.Martell.tokih+'</td></tr></table><form class="form" ><p class="col_50"><label for="bid">Your bid:</label><br/><input type="text" name="bid" id="bid" value="" tabindex="1" maxlength="2" onkeypress="if ((event.keyCode < 48) || (event.keyCode > 57)) event.returnValue=false;"/></p><div><input id ="sendbid" type="submit" value="Bid" class="button" /></div></form>');
                $("#popup2Error").html('');

                $("#sendbid").click(function() {
                    var mybid = parseInt($('#bid').val().replace(/^[0]([0-9])/, '$1'));

                    if (mybid >= 0 && mybid <= eval('houses.'+myhouse+'.tokih')) {
                        $.get('php/bid_wild.php', {id: game_id, house: house, myhouse: myhouse, bid: mybid});
                        disablePopup2();
                        myInterval = setInterval("refresh();", 3000);
                        eval('houses.'+myhouse+'.ready = 1');
                    } else {
                        $("#popup2Error").html('Your bid should not exceed your number of Power tokens');
                        $('#bid').focus();
                    }
                    return false;
                });

                centerPopup2();
                loadPopup2();
            } else if (faza == 0) {//player already bidded
                $("#popup2Content").html('<table style="margin-top:10px;" width="400" border="1" align="center"><tr><th colspan="2" scope="col"><p>Wildling Attack!</p></th></tr><tr><td width="250" align="center" valign="middle">Wildlings` Power</td><td align="center" valign="middle">'+(wildpower*2)+'</td></tr></table>');
                $("#popup2Error").html('');
                topPopup2();
                load2Popup2();
            }
		} else
		
		//Mustering
		if (eval('WC1['+turn+']') == 1) {
			currentplayer = row.currentplayer;
			$('#now').html(currentplayer);
			
			if (currentplayer == myhouse && faza == 0) {
				clearInterval(myInterval);
				loadReady();
			}
			//objects on map setup
			mapsetup();
		} else

        //Supply
        if (eval('WC1['+turn+']') == 2) {
            $('#now').html('All');

            if (eval('houses.'+myhouse+'.ready') == 0 && faza == 0) {
                clearInterval(myInterval);
                loadReady();

                //houses info setup
                housesinfo();
            } else {
                //objects on map setup
                mapsetup();
                //houses info setup
                housesinfo();
            }
        }  else

        //Throne of Blades
        if (eval('WC1['+turn+']') == 3) {
            $('#now').html(throne[0]);

            if (myhouse == throne[0] && myhouse != undefined && faza == 0) {
                clearInterval(myInterval);

                $("#popup2Content").html('<h4>The Holder of the Iron Throne may choose Supply, Mustering or nothing.</h4><div id="Supply" class="button">Supply</div><div id="Mustering" class="button">Mustering</div><div id="nothing" class="button">nothing</div>');

                $("#Supply").click(function() {
                    $.get('php/throneofblades.php', {id: game_id, card: 2});
                    disablePopup2();
                    myInterval = setInterval("refresh();", 3000);
                });
                $("#Mustering").click(function() {
                    $.get('php/throneofblades.php', {id: game_id, card: 1});
                    disablePopup2();
                    myInterval = setInterval("refresh();", 3000);
                });
                $("#nothing").click(function() {
                    $.get('php/throneofblades.php', {id: game_id, card: 0});
                    disablePopup2();
                    myInterval = setInterval("refresh();", 3000);
                });

                centerPopup2();
                loadPopup2();
            }
        } else

        //Winter is Coming
        if (eval('WC1['+turn+']') == 4) {
            $('#now').html(throne[0]);

            if (myhouse == throne[0] && myhouse != undefined && faza == 0) {
                clearInterval(myInterval);

                $("#popup2Content").html('<h4>Shuffle this deck then draw and resolve new card.</h4><div id="Shuffle" class="button">Shuffle</div>');

                $("#Shuffle").click(function() {
                    $.get('php/shuffle_wc1.php', {id: game_id});
                    disablePopup2();
                    myInterval = setInterval("refresh();", 3000);
                });

                centerPopup2();
                loadPopup2();
            }
        }
	});
};

//Westeros Card 2 phase refresh
function wc2refresh() {
    $.getJSON('php/game_refresh1.php', {id: game_id}, function(row){
        faza = parseInt(row.faza);
        if (faza == 2) {
            $('#phase').html('Westeros Card 3');
            $('#now').html('updating...');
            housesinfo();
        } else if (faza == 3) {
            $('#phase').html('Planning');
            $('#now').html('All');
            initialize();
        };

        //WC table
        for (i=1; i<11; i++){
            WC2[i] = eval('row.WC2_'+i);
        }
        i=1;
        $('#WCards td').each(function() {
            if (turn != 0) {
                //WC2
                if (i==2) {
                    if (eval('WC'+i+'['+turn+']') == 0) {
                        $(this).html('Clash of Kings');
                    } else if (eval('WC'+i+'['+turn+']') == 1) {
                        $(this).html('Dark Wings, Dark Words');
                    } else if (eval('WC'+i+'['+turn+']') == 2) {
                        $(this).html('Game of Thrones');
                    } else if (eval('WC'+i+'['+turn+']') == 3) {
                        $(this).html('Last Days of Summer');
                    } else if (eval('WC'+i+'['+turn+']') == 4) {
                        $(this).html('Winter is Coming');
                    };
                }
            } else {
                $(this).html(eval('WC'+i+'['+turn+']'));
            };
            i++;
        });

        //Clash of Kings
        if (eval('WC2['+turn+']') == 0) {
            $('#now').html('All');
            housesinfo();

            //influence track setup
            for (i=0; i<6; i++){
                throne[i] = eval('row.throne'+(i+1));
                fiefdom[i] = eval('row.fiefdom'+(i+1));
                court[i] = eval('row.court'+(i+1));
                $('#'+throne[i]+'-throne').hide();
                $('#'+fiefdom[i]+'-blade').hide();
                $('#'+court[i]+'-raven').hide();
            }

            i=0;
            $('#track table tr:eq(0) td').each(function() {
                $(this).html('<div class="' + throne[i] + '-track token"></div>');
                i++;
            });
            i=0;
            $('#track table tr:eq(1) td').each(function() {
                $(this).html('<div class="' + fiefdom[i] + '-track token"></div>');
                i++;
            });
            i=0;
            $('#track table tr:eq(2) td').each(function() {
                $(this).html('<div class="' + court[i] + '-track token"></div>');
                i++;
            });

            //uniq tokens setup
            $('#'+throne[0]+'-throne').show();
            $('#'+fiefdom[0]+'-blade').show();
            $('#'+court[0]+'-raven').show();

            if (row['1ready'] == 0) {
                var curtrack = 'Iron Throne';
            } else if (row['1ready'] == 1) {
                var curtrack = 'Fiefdoms';
            } else if (row['1ready'] == 2) {
                var curtrack = 'King`s Court';
            };
            if (eval('houses.'+myhouse+'.ready') == 0 && row.currentplayer < 6 && faza == 1) {//bidding
                clearInterval(myInterval);
                $("#popup2Content").html('<table style="margin-top:10px;" width="400" border="1" align="center"><tr><th colspan="2" scope="col"><p>Clash of Kings</p></th></tr><tr><td width="250" align="center" valign="middle">Bidding on</td><td align="center" valign="middle">'+curtrack+'</td></tr><tr><td colspan="2" scope="col" align="center" valign="middle">House`s Power tokens</td></tr><tr><td align="center" valign="middle">Stark</td><td align="center" valign="middle">'+houses.Stark.tokih+'</td></tr><tr><td align="center" valign="middle">Greyjoy</td><td align="center" valign="middle">'+houses.Greyjoy.tokih+'</td></tr><tr><td align="center" valign="middle">Lannister</td><td align="center" valign="middle">'+houses.Lannister.tokih+'</td></tr><tr><td align="center" valign="middle">Baratheon</td><td align="center" valign="middle">'+houses.Baratheon.tokih+'</td></tr><tr><td align="center" valign="middle">Tyrell</td><td align="center" valign="middle">'+houses.Tyrell.tokih+'</td></tr><tr><td align="center" valign="middle">Martell</td><td align="center" valign="middle">'+houses.Martell.tokih+'</td></tr></table><form class="form" ><p class="col_50"><label for="bid">Your bid:</label><br/><input type="text" name="bid" id="bid" value="" tabindex="1" maxlength="2" onkeypress="if ((event.keyCode < 48) || (event.keyCode > 57)) event.returnValue=false;"/></p><div><input id ="sendbid" type="submit" value="Bid" class="button" /></div></form>');
                $("#popup2Error").html('');

                $("#sendbid").click(function() {
                    var mybid = parseInt($('#bid').val().replace(/^[0]([0-9])/, '$1'));

                    if (mybid >= 0 && mybid <= eval('houses.'+myhouse+'.tokih')) {
                        $.get('php/bid_track.php', {id: game_id, house: house, myhouse: myhouse, bid: mybid});
                        disablePopup2();
                        myInterval = setInterval("refresh();", 3000);
                        eval('houses.'+myhouse+'.ready = 1');
                    } else {
                        $("#popup2Error").html('Your bid should not exceed your number of Power tokens');
                        $('#bid').focus();
                    }
                    return false;
                });

                centerPopup2();
                loadPopup2();
            } else if (row.currentplayer == 6 && faza == 1) {//breaking tie
                $("#popup2Content").html('<table style="margin-top:10px;" width="400" border="1" align="center"><tr><th colspan="2" scope="col"><p>Clash of Kings</p></th></tr><tr><td width="250" align="center" valign="middle">Bidding on</td><td align="center" valign="middle">'+curtrack+'</td></tr><tr><td colspan="2" scope="col" align="center" valign="middle">House`s bids</td></tr><tr><td align="center" valign="middle">Stark</td><td align="center" valign="middle">'+row.Stark+'</td></tr><tr><td align="center" valign="middle">Greyjoy</td><td align="center" valign="middle">'+row.Greyjoy+'</td></tr><tr><td align="center" valign="middle">Lannister</td><td align="center" valign="middle">'+row.Lannister+'</td></tr><tr><td align="center" valign="middle">Baratheon</td><td align="center" valign="middle">'+row.Baratheon+'</td></tr><tr><td align="center" valign="middle">Tyrell</td><td align="center" valign="middle">'+row.Tyrell+'</td></tr><tr><td align="center" valign="middle">Martell</td><td align="center" valign="middle">'+row.Martell+'</td></tr></table>');
                $("#popup2Error").html('');

                if (myhouse == throne[0] && myhouse != undefined) {
                    clearInterval(myInterval);
                    $("#popup2Content").append('<h3>Choose order of the houses</h3><form><ol id="bids"></ol></form><div><input id ="tiesubmit" type="submit" value="Done" class="button" /></div>');

                    //click on Done
                    $("#tiesubmit").click(function(){
                        var bid1 = document.getElementById('select-1').value;
                        var bid2 = document.getElementById('select-2').value;
                        var bid3 = document.getElementById('select-3').value;
                        var bid4 = document.getElementById('select-4').value;
                        var bid5 = document.getElementById('select-5').value;
                        var bid6 = document.getElementById('select-6').value;
                        if (bid1 != bid2 && bid1 != bid3 && bid1 != bid4 && bid1 != bid5 && bid1 != bid6 && bid2 != bid3 && bid2 != bid4 && bid2 != bid5 && bid2 != bid6 && bid3 != bid4 && bid3 != bid5 && bid3 != bid6 && bid4 != bid5 && bid4 != bid6 && bid5 != bid6) {
                            $.get('php/tie_track.php', {id: game_id, bid1: bid1, bid2: bid2, bid3: bid3, bid4: bid4, bid5: bid5, bid6: bid6, house: house});
                            disablePopup2();
                            myInterval = setInterval("refresh();", 3000);
                        } else {
                            $("#popup2Error").html('Place all Houses in the desired order');
                        }
                        return false;
                    });
                    //sorting bids
                    var bids = new Object();
                    bids.Stark = row.Stark;
                    bids.Baratheon = row.Baratheon;
                    bids.Tyrell = row.Tyrell;
                    bids.Greyjoy = row.Greyjoy;
                    bids.Martell = row.Martell;
                    bids.Lannister = row.Lannister;
                    bids = asort(bids);
                    var doma = new Array();
                    var j = 1;
                    for(i in bids) {
                        doma[j] = i;
                        j++;
                    };
                    //display uniq bids and even bids
                    for (i = 1; i < 7; i++) {
                        if (bids[doma[i]] != bids[doma[i+1]]) {//single
                            $("#bids").append('<li><select disabled="true" name="bid'+ i +'" id="select-'+ i +'"><option value="'+ doma[i] +'">'+ doma[i] +'</option></select></li>');
                        } else if (bids[doma[i]] == bids[doma[i+1]]) {//2 even
                            $("#bids").append('<li><select name="bid'+ i +'" id="select-'+ i +'" class="select-'+ i +'"><option selected="selected" value="'+ doma[i] +'">'+ doma[i] +'</option><option value="'+ doma[i+1] +'">'+ doma[i+1] +'</option></select></li><li><select name="bid'+ (i+1) +'" id="select-'+ (i+1) +'" class="select-'+ i +'"><option value="'+ doma[i] +'">'+ doma[i] +'</option><option selected="selected" value="'+ doma[i+1] +'">'+ doma[i+1] +'</option></select></li>');
                            if (bids[doma[i]] == bids[doma[i+2]]) {//3 even
                                $("#select-"+ i).append('<option value="'+ doma[i+2] +'">'+ doma[i+2] +'</option>');
                                $("#select-"+ (i+1)).append('<option value="'+ doma[i+2] +'">'+ doma[i+2] +'</option>');
                                $("#bids").append('<li><select name="bid'+ (i+2) +'" id="select-'+ (i+2) +'" class="select-'+ i +'"><option value="'+ doma[i] +'">'+ doma[i] +'</option><option value="'+ doma[i+1] +'">'+ doma[i+1] +'</option><option selected="selected" value="'+ doma[i+2] +'">'+ doma[i+2] +'</option></select></li>');
                                if (bids[doma[i]] == bids[doma[i+3]]) {//4 even
                                    $("#select-"+ i).append('<option value="'+ doma[i+3] +'">'+ doma[i+3] +'</option>');
                                    $("#select-"+ (i+1)).append('<option value="'+ doma[i+3] +'">'+ doma[i+3] +'</option>');
                                    $("#select-"+ (i+2)).append('<option value="'+ doma[i+3] +'">'+ doma[i+3] +'</option>');
                                    $("#bids").append('<li><select name="bid'+ (i+3) +'" id="select-'+ (i+3) +'" class="select-'+ i +'"><option value="'+ doma[i] +'">'+ doma[i] +'</option><option value="'+ doma[i+1] +'">'+ doma[i+1] +'</option><option value="'+ doma[i+2] +'">'+ doma[i+2] +'</option><option selected="selected" value="'+ doma[i+3] +'">'+ doma[i+3] +'</option></select></li>');
                                    if (bids[doma[i]] == bids[doma[i+4]]) {//5 even
                                        $("#select-"+ i).append('<option value="'+ doma[i+4] +'">'+ doma[i+4] +'</option>');
                                        $("#select-"+ (i+1)).append('<option value="'+ doma[i+4] +'">'+ doma[i+4] +'</option>');
                                        $("#select-"+ (i+2)).append('<option value="'+ doma[i+4] +'">'+ doma[i+4] +'</option>');
                                        $("#select-"+ (i+3)).append('<option value="'+ doma[i+4] +'">'+ doma[i+4] +'</option>');
                                        $("#bids").append('<li><select name="bid'+ (i+4) +'" id="select-'+ (i+4) +'" class="select-'+ i +'"><option value="'+ doma[i] +'">'+ doma[i] +'</option><option value="'+ doma[i+1] +'">'+ doma[i+1] +'</option><option value="'+ doma[i+2] +'">'+ doma[i+2] +'</option><option value="'+ doma[i+3] +'">'+ doma[i+3] +'</option><option selected="selected" value="'+ doma[i+4] +'">'+ doma[i+4] +'</option></select></li>');
                                        if (bids[doma[i]] == bids[doma[i+5]]) {//6 even
                                            $("#select-"+ i).append('<option value="'+ doma[i+5] +'">'+ doma[i+5] +'</option>');
                                            $("#select-"+ (i+1)).append('<option value="'+ doma[i+5] +'">'+ doma[i+5] +'</option>');
                                            $("#select-"+ (i+2)).append('<option value="'+ doma[i+5] +'">'+ doma[i+5] +'</option>');
                                            $("#select-"+ (i+3)).append('<option value="'+ doma[i+5] +'">'+ doma[i+5] +'</option>');
                                            $("#select-"+ (i+4)).append('<option value="'+ doma[i+5] +'">'+ doma[i+5] +'</option>');
                                            $("#bids").append('<li><select name="bid'+ (i+5) +'" id="select-'+ (i+5) +'" class="select-'+ i +'"><option value="'+ doma[i] +'">'+ doma[i] +'</option><option value="'+ doma[i+1] +'">'+ doma[i+1] +'</option><option value="'+ doma[i+2] +'">'+ doma[i+2] +'</option><option value="'+ doma[i+3] +'">'+ doma[i+3] +'</option><option value="'+ doma[i+4] +'">'+ doma[i+4] +'</option><option selected="selected" value="'+ doma[i+5] +'">'+ doma[i+5] +'</option></select></li>');
                                            i++;
                                        }
                                        i++;
                                    }
                                    i++;
                                }
                                i++;
                            }
                            i++;
                        }
                    }
                };

                centerPopup2();
                loadPopup2();
            } else if (faza == 1) {//player already bidded
                $("#popup2Content").html('<table style="margin-top:10px;" width="400" border="1" align="center"><tr><th colspan="2" scope="col"><p>Clash of Kings</p></th></tr><tr><td width="250" align="center" valign="middle">Bidding on</td><td align="center" valign="middle">'+curtrack+'</td></tr><tr><td colspan="2" scope="col" align="center" valign="middle">House`s Power tokens</td></tr><tr><td align="center" valign="middle">Stark</td><td align="center" valign="middle">'+houses.Stark.tokih+'</td></tr><tr><td align="center" valign="middle">Greyjoy</td><td align="center" valign="middle">'+houses.Greyjoy.tokih+'</td></tr><tr><td align="center" valign="middle">Lannister</td><td align="center" valign="middle">'+houses.Lannister.tokih+'</td></tr><tr><td align="center" valign="middle">Baratheon</td><td align="center" valign="middle">'+houses.Baratheon.tokih+'</td></tr><tr><td align="center" valign="middle">Tyrell</td><td align="center" valign="middle">'+houses.Tyrell.tokih+'</td></tr><tr><td align="center" valign="middle">Martell</td><td align="center" valign="middle">'+houses.Martell.tokih+'</td></tr></table>');
                $("#popup2Error").html('');
                topPopup2();
                load2Popup2();
            }
        } else

        //Dark Wings, Dark Words
        if (eval('WC2['+turn+']') == 1) {
            $('#now').html(court[0]);

            if (myhouse == court[0] && myhouse != undefined && faza == 1) {
                clearInterval(myInterval);

                $("#popup2Content").html('<h4>The holder of the Messenger Raven may choose Game of Thrones, Clash of Kings, or nothing.</h4><div id="GoT" class="button">Game of Thrones</div><div id="CoK" class="button">Clash of Kings</div><div id="nothing" class="button">nothing</div>');

                $("#GoT").click(function() {
                    $.get('php/darkwings.php', {id: game_id, card: 2});
                    disablePopup2();
                    myInterval = setInterval("refresh();", 3000);
                });
                $("#CoK").click(function() {
                    $.get('php/darkwings.php', {id: game_id, card: 0});
                    disablePopup2();
                    myInterval = setInterval("refresh();", 3000);
                });
                $("#nothing").click(function() {
                    $.get('php/darkwings.php', {id: game_id, card: 3});
                    disablePopup2();
                    myInterval = setInterval("refresh();", 3000);
                });

                centerPopup2();
                loadPopup2();
            }
        } else

        //Winter is Coming
        if (eval('WC2['+turn+']') == 4) {
            $('#now').html(throne[0]);

            if (myhouse == throne[0] && myhouse != undefined && faza == 1) {
                clearInterval(myInterval);

                $("#popup2Content").html('<h4>Shuffle this deck then draw and resolve new card.</h4><div id="Shuffle" class="button">Shuffle</div>');

                $("#Shuffle").click(function() {
                    $.get('php/shuffle_wc2.php', {id: game_id});
                    disablePopup2();
                    myInterval = setInterval("refresh();", 3000);
                });

                centerPopup2();
                loadPopup2();
            }
        }
    });
};

//Westeros Card 3 phase refresh
function wc3refresh() {
    $.getJSON('php/game_refresh3.php', {id: game_id}, function(row){
        faza = parseInt(row);
        if (faza == 3) {
            $('#phase').html('Planning');
            $('#now').html('All');
            initialize();
        };

        //Put to the Sword
        if (eval('WC3['+turn+']') == 1) {
            $('#now').html(fiefdom[0]);

            if (myhouse == fiefdom[0] && myhouse != undefined && faza == 2) {
                clearInterval(myInterval);

                $("#popup2Content").html('<h4>The holder of the Valyrian Steel Blade may choose no Defence, no March+1* or nothing.</h4><div id="noDef" class="button">no Defence</div><div id="noMar" class="button">no March+1*</div><div id="nothing" class="button">nothing</div>');

                $("#noDef").click(function() {
                    $.get('php/putsword.php', {id: game_id, card: 4});
                    disablePopup2();
                    myInterval = setInterval("refresh();", 3000);
                });
                $("#noMar").click(function() {
                    $.get('php/putsword.php', {id: game_id, card: 2});
                    disablePopup2();
                    myInterval = setInterval("refresh();", 3000);
                });
                $("#nothing").click(function() {
                    $.get('php/putsword.php', {id: game_id, card: 1});
                    disablePopup2();
                    myInterval = setInterval("refresh();", 3000);
                });

                centerPopup2();
                loadPopup2();
            }
        } else

        //Wildling Attack
        if (eval('WC3['+turn+']') == 6) {
            $('#now').html('All');

            if (eval('houses.'+myhouse+'.ready') == 0 && faza == 2) {
                clearInterval(myInterval);
                $("#popup2Content").html('<table style="margin-top:10px;" width="400" border="1" align="center"><tr><th colspan="2" scope="col"><p>Wildling Attack!</p></th></tr><tr><td width="250" align="center" valign="middle">Wildlings` Power</td><td align="center" valign="middle">'+(wildpower*2)+'</td></tr><tr><td colspan="2" scope="col" align="center" valign="middle">House`s Power tokens</td></tr><tr><td align="center" valign="middle">Stark</td><td align="center" valign="middle">'+houses.Stark.tokih+'</td></tr><tr><td align="center" valign="middle">Greyjoy</td><td align="center" valign="middle">'+houses.Greyjoy.tokih+'</td></tr><tr><td align="center" valign="middle">Lannister</td><td align="center" valign="middle">'+houses.Lannister.tokih+'</td></tr><tr><td align="center" valign="middle">Baratheon</td><td align="center" valign="middle">'+houses.Baratheon.tokih+'</td></tr><tr><td align="center" valign="middle">Tyrell</td><td align="center" valign="middle">'+houses.Tyrell.tokih+'</td></tr><tr><td align="center" valign="middle">Martell</td><td align="center" valign="middle">'+houses.Martell.tokih+'</td></tr></table><form class="form" ><p class="col_50"><label for="bid">Your bid:</label><br/><input type="text" name="bid" id="bid" value="" tabindex="1" maxlength="2" onkeypress="if ((event.keyCode < 48) || (event.keyCode > 57)) event.returnValue=false;"/></p><div><input id ="sendbid" type="submit" value="Bid" class="button" /></div></form>');
                $("#popup2Error").html('');

                $("#sendbid").click(function() {
                    var mybid = parseInt($('#bid').val().replace(/^[0]([0-9])/, '$1'));

                    if (mybid >= 0 && mybid <= eval('houses.'+myhouse+'.tokih')) {
                        $.get('php/bid_wild.php', {id: game_id, house: house, myhouse: myhouse, bid: mybid});
                        disablePopup2();
                        myInterval = setInterval("refresh();", 3000);
                        eval('houses.'+myhouse+'.ready = 1');
                    } else {
                        $("#popup2Error").html('Your bid should not exceed your number of Power tokens');
                        $('#bid').focus();
                    }
                    return false;
                });

                centerPopup2();
                loadPopup2();
            } else if (faza == 2) {//player already bidded
                $("#popup2Content").html('<table style="margin-top:10px;" width="400" border="1" align="center"><tr><th colspan="2" scope="col"><p>Wildling Attack!</p></th></tr><tr><td width="250" align="center" valign="middle">Wildlings` Power</td><td align="center" valign="middle">'+(wildpower*2)+'</td></tr></table>');
                $("#popup2Error").html('');
                topPopup2();
                load2Popup2();
            }
        };
    });
};

//planning phase refresh
function planningrefresh() {
	$.getJSON('php/game_refresh3.php', {id: game_id}, function(row){
		faza = parseInt(row);
		if (faza == 4) {
			$('#phase').html('Raven');
			$('#now').html('Raven');
			disableReady();
		} else if (faza == 5) {
			$('#phase').html('Raids');
			disableReady();
		} else if (faza == 6) {
			$('#phase').html('Marches');
			disableReady();
		}
	});
};

//raven phase refresh
function ravenrefresh() {
	$.getJSON('php/game_refresh4.php', {id: game_id, table:terr}, function(row){
		faza = parseInt(row.faza);
		if (faza == 5) {
			$('#phase').html('Raids');
		} else if (faza == 6) {
			$('#phase').html('Marches');
		}
		
		$('#board .land').each(function() {
			$('#'+ $(this).attr("id") +' .order').remove();
			var tempval = 'row.'+$(this).attr("id")+'.';
			
			if (eval(tempval+'prikaz') !=0) {
				$("#"+$(this).attr("id")).append('<div class="order'+ eval(tempval+'prikaz') +' order">'+eval(tempval+'prikaz')+'</div>');
			}
			
		});
		$('#board .water').each(function() {
			$('#'+ $(this).attr("id") +' .order').remove();
			var tempval = 'row.'+$(this).attr("id")+'.';
			
			if (eval(tempval+'prikaz') !=0) {
				$("#"+$(this).attr("id")).append('<div class="order'+ eval(tempval+'prikaz') +' order">'+eval(tempval+'prikaz')+'</div>');
			}
		});
		
	});
};

//raid phase refresh
function raidrefresh() {
	$.getJSON('php/game_refresh5.php', {id: game_id, table:terr, house:house}, function(json){
		faza = parseInt(json.faza);
		if (faza == 6) {
			$('#phase').html('Marches');
		} else if (faza == 7) {
			$('#phase').html('Call for support');
			$('#now').html('updating...');
		} else if (faza == 14) {
			$('#phase').html('Consolidate Powers');
			$('#now').html('updating...');
		}
		
		prikazi5 = json;
		$('#board .land').each(function() {
			$('#'+ $(this).attr("id") +' .order').remove();
			var tempval = 'prikazi5.'+$(this).attr("id")+'.';
			
			if (eval(tempval+'prikaz') !=0) {
				$("#"+$(this).attr("id")).append('<div class="order'+ eval(tempval+'prikaz') +' order">'+eval(tempval+'prikaz')+'</div>');
			}
			
		});
		$('#board .water').each(function() {
			$('#'+ $(this).attr("id") +' .order').remove();
			var tempval = 'prikazi5.'+$(this).attr("id")+'.';
			
			if (eval(tempval+'prikaz') !=0) {
				$("#"+$(this).attr("id")).append('<div class="order'+ eval(tempval+'prikaz') +' order">'+eval(tempval+'prikaz')+'</div>');
			}
		});
		
		$('#BaratheonPT').html(json.Baratheon.tokih);
		$('#GreyjoyPT').html(json.Greyjoy.tokih);
		$('#LannisterPT').html(json.Lannister.tokih);
		$('#MartellPT').html(json.Martell.tokih);
		$('#StarkPT').html(json.Stark.tokih);
		$('#TyrellPT').html(json.Tyrell.tokih);
		
		currentplayer = json.currentplayer;
		$('#now').html(currentplayer);
	});
};

//march phase refresh
function marchrefresh() {
	$.getJSON('php/game_refresh6.php', {id: game_id}, function(row){
		
		faza = parseInt(row.faza);
		if (faza == 7) {
			$('#phase').html('Call for support');
			$('#now').html('updating...');
		} else if (faza == 8) {
			$('#phase').html('Choose House Card');
			$('#now').html('Attacking and defending lords');
		} else if (faza == 9) {
			$('#phase').html('Reveal House Cards');
			$('#now').html('Attacking and defending lords');
		} else if (faza == 10) {
			$('#phase').html('Valyrian Steel Blade');
			$('#now').html('Valyrian Steel Blade');
		} else if (faza == 11) {
			$('#phase').html('Combat resolution');
			$('#now').html('Attacking and defending lords');
		} else if (faza == 14) {
			$('#phase').html('Consolidate Powers');
			$('#now').html('updating...');
		} else if (faza == 15) {
			$('#phase').html('Call for support');
			$('#now').html('updating...');
		} else if (faza == 0) {
			$('#phase').html('Westeros Card 1');
			$('#now').html('updating...');
			turn = turn+1;
			$('#turn').html(turn+1);
		} else if (faza == 1) {
			$('#phase').html('Westeros Card 2');
			$('#now').html('updating...');
			turn = turn+1;
			$('#turn').html(turn+1);
		} else if (faza == 2) {
			$('#phase').html('Westeros Card 3');
			$('#now').html('updating...');
			turn = turn+1;
			$('#turn').html(turn+1);
		}
		
		//influence track setup
		for (i=0; i<6; i++){
			throne[i] = eval('row.throne'+(i+1));
			fiefdom[i] = eval('row.fiefdom'+(i+1));
			court[i] = eval('row.court'+(i+1));
            $('#'+throne[i]+'-throne').hide();
            $('#'+fiefdom[i]+'-blade').hide();
            $('#'+court[i]+'-raven').hide();
		}
		
		i=0;
		$('#track table tr:eq(0) td').each(function() {
			$(this).html('<div class="' + throne[i] + '-track token"></div>');
			i++;
		});
		i=0;
		$('#track table tr:eq(1) td').each(function() {
			$(this).html('<div class="' + fiefdom[i] + '-track token"></div>');
			i++;
		});
		i=0;
		$('#track table tr:eq(2) td').each(function() {
			$(this).html('<div class="' + court[i] + '-track token"></div>');
			i++;
		});
		
		//uniq tokens setup
		$('#'+throne[0]+'-throne').show();
		$('#'+fiefdom[0]+'-blade').show();
		$('#'+court[0]+'-raven').show();
		
		//max special orders and raven and blade
		for (i=0; i<6; i++){
			if (court[i] == myhouse) {
				mycourt = i;
			}
		}
        if (mycourt < 2) {maxspecial = 3} else {
            if (mycourt == 2) {maxspecial = 2} else {
                if (mycourt == 3) {maxspecial = 1} else {
                    maxspecial = 0;
                }
            }
        }
		blade = row.Blade;
		if (blade == 1) {
			$('#'+fiefdom[0]+'-blade').addClass('discarded');
		} else {
			$('#'+fiefdom[0]+'-blade').removeClass('discarded');
		}
		//objects on map setup
		mapsetup();
		
		//houses info setup
		housesinfo();
		
		currentplayer = row.currentplayer;
		$('#now').html(currentplayer);
		
		win = row.win;
	});	
};

//call fo support phase refresh
function supportrefresh() {
	$.getJSON('php/game_refresh7.php', {id: game_id}, function(json){
		battle = json;
		faza = parseInt(json.faza);
		if (faza == 6) {
			$('#phase').html('Marches');
		} else if (faza == 8) {
			$('#phase').html('Choose House Card');
			$('#now').html('Attacking and defending lords');
		} else if (faza == 9) {
			$('#phase').html('Reveal House Cards');
			$('#now').html('Attacking and defending lords');
		} else if (faza == 10) {
			$('#phase').html('Valyrian Steel Blade');
			$('#now').html('Valyrian Steel Blade holder');
		} else if (faza == 11) {
			$('#phase').html('Combat resolution');
			$('#now').html('Loser');
		} else if (faza == 12) {
			$('#phase').html('Retreat');
			$('#now').html('updating...');
		} else if (faza == 13) {
			$('#phase').html('Clean Up');
			$('#now').html('updating...');
		} else if (faza == 14) {
			$('#phase').html('Consolidate Powers');
			$('#now').html('updating...');
		}
		
		currentplayer = json.currentplayer;
		
		$('#now').html(currentplayer);
		if ($('#'+json.target).hasClass('battle')) {} else {
			$('#'+json.target).addClass('battle');
		}
		
		//popup with info about battle
		$("#popupContent").html('<table style="margin-top:10px;" width="600" border="1" align="center"><tr><th colspan="2" scope="col"><p>Battle on '+json.target+'</p></th></tr><tr><td align="center" valign="middle">Attacker</td><td align="center" valign="middle">Defender</td></tr><tr><td align="center" valign="middle">'+json.attacker+'</td><td align="center" valign="middle">'+json.defender+'</td></tr><tr><td id="aunits"></td><td id="dunits"></td></tr><tr><td id="aorder"></td><td id="dorder"></td></tr><tr><td id="asupport"></td><td id="dsupport"></td></tr></table>');
		
		//fill attacking and defending units
		var tempbattle = 'battle.a';
		var tempcontrol = eval('units.'+json.starting+'.control');
		placeunitbattle(tempbattle, 'aunits', tempcontrol);
		
		var tempbattle = 'battle.d';
		var tempcontrol = eval('units.'+json.target+'.control');
		placeunitbattle(tempbattle, 'dunits', tempcontrol);
		
		$("#aorder").html('<div class="order'+ battle.aorder +' order"></div>');
		$("#dorder").html('<div class="order'+ battle.dorder +' order"></div>');
		
		if (battle.garrison != 0) {
			placegar('battle.', 'dunits');
		}
		//fill supporting units
		for (i=1; i<8; i++) {
			if (eval('battle.asup'+i) != 0) {
				var supterr = 'units.'+eval('battle.asup'+i)+'.';
				var supcon = eval('units.'+eval('battle.asup'+i)+'.control');
				placeunitbattle(supterr, 'asupport', supcon);
			}
			if (eval('battle.dsup'+i) != 0) {
				var supterr = 'units.'+eval('battle.dsup'+i)+'.';
				var supcon = eval('units.'+eval('battle.dsup'+i)+'.control');
				placeunitbattle(supterr, 'dsupport', supcon);
			}
		}
		$("#popupError").html('');
		
		//centering with css  
		centerPopup();  
		//load popup  
		loadPopup();
		
		if (currentplayer == myhouse) {
			clearInterval(myInterval);
			$("#popup2Content").html('<h2>Choose your side:</h2><form class="clearfix"></form>');
			i = 1;
			for (name in units) {
				if (units[name].control == mycontrol && (karta[battle.target][name] == 1 || karta[battle.target][name] == 2) && (units[name].prikaz == 5 || units[name].prikaz == 10)) {
					if (battle.attacker == myhouse) {
						$("#popup2Content form").append('<div class="supzone"><h4>'+name+'</h4><div class="supunitsdiv clearfix" id="'+name+'-units"></div><input type="hidden" name="zone'+i+'" value="'+name+'"/><label class="button" for="zone'+i+'-choice-1"><input type="radio" name="'+name+'" id="zone'+i+'-choice-1" tabindex="2" value="a" /> '+battle.attacker+'</label><label class="button" for="zone'+i+'-choice-2"><input type="radio" name="'+name+'" id="zone'+i+'-choice-2" tabindex="3" value="0" checked/> No one</label></div>');
					} else if (battle.defender == myhouse) {
						$("#popup2Content form").append('<div class="supzone"><h4>'+name+'</h4><div class="supunitsdiv clearfix" id="'+name+'-units"></div><input type="hidden" name="zone'+i+'" value="'+name+'"/><label class="button" for="zone'+i+'-choice-2"><input type="radio" name="'+name+'" id="zone'+i+'-choice-2" tabindex="3" value="0" checked/> No one</label><label class="button" for="zone'+i+'-choice-3"><input type="radio" name="'+name+'" id="zone'+i+'-choice-3" tabindex="4" value="d" /> '+battle.defender+'</label></div>');
					} else {
						$("#popup2Content form").append('<div class="supzone"><h4>'+name+'</h4><div class="supunitsdiv clearfix" id="'+name+'-units"></div><input type="hidden" name="zone'+i+'" value="'+name+'"/><label class="button" for="zone'+i+'-choice-1"><input type="radio" name="'+name+'" id="zone'+i+'-choice-1" tabindex="2" value="a" /> '+battle.attacker+'</label><label class="button" for="zone'+i+'-choice-2"><input type="radio" name="'+name+'" id="zone'+i+'-choice-2" tabindex="3" value="0" checked/> No one</label><label class="button" for="zone'+i+'-choice-3"><input type="radio" name="'+name+'" id="zone'+i+'-choice-3" tabindex="4" value="d" /> '+battle.defender+'</label></div>');
					}
					i++;
					var supterr = 'units.'+name+'.';
					var supcon = eval('units.'+name+'.control');
					placeunitbattle(supterr, name+'-units', supcon);
					$('#'+name+'-units').append('<div class="order'+ units[name].prikaz +' order"></div>');
				}
				
			}
			
			$("#popup2Content").append('<div id="submitsup" class="button">Apply</div>');
			$("#submitsup").click(function() {
				var supform = $("#popup2Content form").serialize();
				$.get('php/change_support.php?'+supform, {id: game_id});
				disablePopup2();
				myInterval = setInterval("refresh();", 3000);
				
			});
			topPopup2();
			loadPopup2(); 
		}
	});
};

//choose House Cards phase refresh
function hcardsrefresh() {
	$.getJSON('php/game_refresh8.php', {id: game_id}, function(json){
		battle = json;
		faza = parseInt(json.faza);
		if (faza == 6) {
			$('#phase').html('Marches');
			$('#now').html('updating...');
		} else if (faza == 9) {
			$('#phase').html('Reveal House Cards');
			$('#now').html('Attacking and defending lords');
		} else if (faza == 10) {
			$('#phase').html('Valyrian Steel Blade');
			$('#now').html('Valyrian Steel Blade');
		} else if (faza == 11) {
			$('#phase').html('Combat resolution');
			$('#now').html('Loser');
		} else if (faza == 12) {
			$('#phase').html('Retreat');
			$('#now').html('updating...');
		} else if (faza == 13) {
			$('#phase').html('Clean Up');
			$('#now').html('updating...');
		} else if (faza == 14) {
			$('#phase').html('Consolidate Powers');
			$('#now').html('updating...');
		}
		
		if ($('#'+json.target).hasClass('battle')) {} else {
			$('#'+json.target).addClass('battle');
		}
		
		//popup with info about battle
		$("#popupContent").html('<table style="margin-top:10px;" width="600" border="1" align="center"><tr><th colspan="2" scope="col"><p>Battle on '+json.target+'</p></th></tr><tr><td align="center" valign="middle">Attacker</td><td align="center" valign="middle">Defender</td></tr><tr><td align="center" valign="middle">'+json.attacker+'</td><td align="center" valign="middle">'+json.defender+'</td></tr><tr><td id="aunits"></td><td id="dunits"></td></tr><tr><td id="aorder"></td><td id="dorder"></td></tr><tr><td id="asupport"></td><td id="dsupport"></td></tr><tr><th colspan="2" scope="col"><p>Initial Combat Strength</p></th></tr><tr><td align="center" valign="middle">'+json.aCS+'</td><td align="center" valign="middle">'+json.dCS+'</td></tr></table>');
		
		//fill attacking and defending units
		var tempbattle = 'battle.a';
		var tempcontrol = eval('units.'+json.starting+'.control');
		placeunitbattle(tempbattle, 'aunits', tempcontrol);
		
		var tempbattle = 'battle.d';
		var tempcontrol = eval('units.'+json.target+'.control');
		placeunitbattle(tempbattle, 'dunits', tempcontrol);
		
		$("#aorder").html('<div class="order'+ battle.aorder +' order"></div>');
		$("#dorder").html('<div class="order'+ battle.dorder +' order"></div>');
		
		if (battle.garrison != 0) {
			placegar('battle.', 'dunits');
		}
		//fill supporting units
		for (i=1; i<8; i++) {
			if (eval('battle.asup'+i) != 0) {
				var supterr = 'units.'+eval('battle.asup'+i)+'.';
				var supcon = eval('units.'+eval('battle.asup'+i)+'.control');
				placeunitbattle(supterr, 'asupport', supcon);
			}
			if (eval('battle.dsup'+i) != 0) {
				var supterr = 'units.'+eval('battle.dsup'+i)+'.';
				var supcon = eval('units.'+eval('battle.dsup'+i)+'.control');
				placeunitbattle(supterr, 'dsupport', supcon);
			}
		}
		$("#popupError").html('');
		
		//centering with css  
		centerPopup();  
		//load popup  
		loadPopup();
		
		//if you are attacker
		if (myhouse == battle.attacker && battle.acard == 0) {
			clearInterval(myInterval);
			$("#popup2Content").html('<h2>Choose your card!</h2><h3>Defender`s available cards:</h3><div class="clearfix" id="opponentcards"></div><h3>Your available cards:</h3><div class="clearfix" id="mycards"></div>');
			$("#popup2Error").html('');
			//opponent cards
			$('#opponentcards').html('');
			drawcards(battle.defender, '#opponentcards');
			
			$('#mycards').html('');
			drawcards(battle.attacker, '#mycards');
			
			$('#mycards div.hcard').click(function() {
				var hero = this.id;
				$.get('php/choose_acard.php', {id: game_id, hero: hero, table: house, terr: terr});
				disablePopup2();
				myInterval = setInterval("refresh();", 3000);
			});
			top2Popup2();
			loadPopup2(); 
		}
		//if you are defender
		if (myhouse == battle.defender && battle.dcard == 0) {
			clearInterval(myInterval);
			$("#popup2Content").html('<h2>Choose your card!</h2><h3>Attacker`s available cards:</h3><div class="clearfix" id="opponentcards"></div><h3>Your available cards:</h3><div class="clearfix" id="mycards"></div>');
			
			//opponent cards
			$('#opponentcards').html('');
			drawcards(battle.attacker, '#opponentcards');
			
			$('#mycards').html('');
			drawcards(battle.defender, '#mycards');
			
			$('#mycards div.hcard').click(function() {
				var hero = this.id;
				$.get('php/choose_dcard.php', {id: game_id, hero: hero, table: house, terr: terr});
				disablePopup2();
				myInterval = setInterval("refresh();", 3000);
			});
			top2Popup2();
			loadPopup2(); 
		}
	});
};

//Reveal House cards phase refresh
function revealhcrefresh() {
	$.getJSON('php/game_refresh9.php', {id: game_id}, function(json){
		battle = json;
		faza = parseInt(json.faza);
		$('#now').html(battle.currentplayer);
		if (faza == 6) {
			$('#phase').html('Marches');
			$('#now').html('updating...');
		} else if (faza == 10) {
			$('#phase').html('Valyrian Steel Blade');
			$('#now').html('Valyrian Steel Blade holder');
		} else if (faza == 11) {
			$('#phase').html('Combat resolution');
			$('#now').html('Loser');
		} else if (faza == 12) {
			$('#phase').html('Retreat');
			$('#now').html('updating...');
		} else if (faza == 13) {
			$('#phase').html('Clean Up');
			$('#now').html('updating...');
		} else if (faza == 14) {
			$('#phase').html('Consolidate Powers');
			$('#now').html('updating...');
		}
		
		if ($('#'+json.target).hasClass('battle')) {} else {
			$('#'+json.target).addClass('battle');
		}
		housesinfo();
		//popup with info about battle
		$("#popupContent").html('<table style="margin-top:10px;" width="600" border="1" align="center"><tr><th colspan="2" scope="col"><p>Battle on '+json.target+'</p></th></tr><tr><td align="center" valign="middle">Attacker</td><td align="center" valign="middle">Defender</td></tr><tr><td align="center" valign="middle">'+json.attacker+'</td><td align="center" valign="middle">'+json.defender+'</td></tr><tr><td id="aunits"></td><td id="dunits"></td></tr><tr><td id="aorder"></td><td id="dorder"></td></tr><tr><td id="asupport"></td><td id="dsupport"></td></tr><tr><th colspan="2" scope="col"><p>Initial Combat Strength</p></th></tr><tr><td align="center" valign="middle">'+json.aCS+'</td><td align="center" valign="middle">'+json.dCS+'</td></tr><tr><td align="center" valign="middle"><div id="'+json.acard+'" class="hcard"></div></td><td align="center" valign="middle"><div id="'+json.dcard+'" class="hcard"></div></td></tr></table>');
		
		//fill attacking and defending units
		var tempbattle = 'battle.a';
		var tempcontrol = eval('units.'+json.starting+'.control');
		placeunitbattle(tempbattle, 'aunits', tempcontrol);
		
		var tempbattle = 'battle.d';
		var tempcontrol = eval('units.'+json.target+'.control');
		placeunitbattle(tempbattle, 'dunits', tempcontrol);
		
		$("#aorder").html('<div class="order'+ battle.aorder +' order"></div>');
		$("#dorder").html('<div class="order'+ battle.dorder +' order"></div>');
		
		if (battle.garrison != 0) {
			placegar('battle.', 'dunits');
		}
		//fill supporting units
		for (i=1; i<8; i++) {
			if (eval('battle.asup'+i) != 0) {
				var supterr = 'units.'+eval('battle.asup'+i)+'.';
				var supcon = eval('units.'+eval('battle.asup'+i)+'.control');
				placeunitbattle(supterr, 'asupport', supcon);
			}
			if (eval('battle.dsup'+i) != 0) {
				var supterr = 'units.'+eval('battle.dsup'+i)+'.';
				var supcon = eval('units.'+eval('battle.dsup'+i)+'.control');
				placeunitbattle(supterr, 'dsupport', supcon);
			}
		}
		$("#popupError").html('');
		
		//centering with css  
		centerPopup();  
		//load popup  
		loadPopup();
		
		//if you are playing Tyrion
		if (myhouse == battle.currentplayer && ((battle.attacker == myhouse && battle.acard == 'Tyrion') || (battle.defender == myhouse && battle.dcard == 'Tyrion')) && faza == 9) {
			clearInterval(myInterval);
			$("#popup2Content").html('<h2>Cancel your opponent`s chosen House card and return it to his hand?</h2><a class="button yes" href="#">Yes</a><a class="button no" href="#">No</a>');
			$("#popup2Error").html('');
			//centering with css  
			centerPopup2();  
			//load popup  
			loadPopup2();
			
			//click on Yes
			$("#popup2Content a.yes").click(function(){
				$.get('php/tyrion_yes.php',{id: game_id, house: house});
				disablePopup2();
				myInterval = setInterval("refresh();", 3000);
				return false;
			});
			
			//click on No
			$("#popup2Content a.no").click(function(){
				$.get('php/tyrion_no.php',{id: game_id, terr: terr, table: house});
				disablePopup2();
				myInterval = setInterval("refresh();", 3000);
				return false;
			});
		} else
		//if you are tyrioned
		if (myhouse == battle.currentplayer && ((battle.attacker == myhouse && battle.dcard == 'Tyrion' && battle.acard == '0') || (battle.defender == myhouse && battle.acard == 'Tyrion' && battle.dcard == '0')) && faza == 9) {
			clearInterval(myInterval);
			$("#popup2Content").html('<h2>Your card is tyrioned! Choose your new card!</h2><h3>Your available cards:</h3><div class="clearfix" id="mycards"></div>');		
			$('#mycards').html('');
			
			if (battle.attacker == myhouse) {
				drawcards(battle.attacker, '#mycards');
			} else {
				drawcards(battle.defender, '#mycards');
			}
			if ($("#mycards").html() == '') {
				$("#mycards").append('<div id="nocard" class="hcard"></div>');
			}
			$('#mycards div.hcard').click(function() {
				var hero = this.id;
				$.get('php/choose_tyrioned.php', {id: game_id, hero: hero, table: house, terr: terr});
				disablePopup2();
				myInterval = setInterval("refresh();", 3000);
			});
			top2Popup2();
			loadPopup2(); 
		} else 
		//if you are playing Aeron
		if (myhouse == battle.currentplayer && ((battle.attacker == myhouse && battle.acard == 'Aeron') || (battle.defender == myhouse && battle.dcard == 'Aeron')) && faza == 9) {
			//if Greyjoy have 2 power
			if (houses.Greyjoy.tokih > 1) {
				clearInterval(myInterval);
				$("#popup2Content").html('<h2>Discard Aeron Damphair and 2 Power tokens to choose a different House Card?</h2><a class="button yes" href="#">Yes</a><a class="button no" href="#">No</a>');
				$("#popup2Error").html('');
				//centering with css  
				centerPopup2();  
				//load popup  
				loadPopup2();
				
				//click on Yes
				$("#popup2Content a.yes").click(function(){
					$("#popup2Content").html('<h2>Choose your new card!</h2><h3>Your available cards:</h3><div class="clearfix" id="mycards"></div>');		
					$('#mycards').html('');
					
					houses.Greyjoy.HC7 = 0;
					if (battle.attacker == myhouse) {
						drawcards(battle.attacker, '#mycards');
					} else {
						drawcards(battle.defender, '#mycards');
					}
					
					$('#mycards div.hcard').click(function() {
						var hero = this.id;
						$.get('php/choose_aeroned.php', {id: game_id, hero: hero, table: house, terr: terr});
						disablePopup2();
						myInterval = setInterval("refresh();", 3000);
					});
					top2Popup2();
					return false;
				});
				
				//click on No
				$("#popup2Content a.no").click(function(){
					$.get('php/aeron_no.php',{id: game_id, terr: terr, table: house});
					disablePopup2();
					myInterval = setInterval("refresh();", 3000);
					return false;
				});
			} else {
				$.get('php/aeron_no.php',{id: game_id, terr: terr, table: house});
			}
		} else
		//if you are playing Doran
		if (myhouse == battle.currentplayer && ((battle.attacker == myhouse && battle.acard == 'Doran') || (battle.defender == myhouse && battle.dcard == 'Doran')) && faza == 9) {
			clearInterval(myInterval);
			
			if (battle.attacker == myhouse) {
				$("#popup2Content").html('<h2>Please choose where to move '+battle.defender+' to the bottom of the track</h2><div id="copytrack"></div><a class="button votethrone" href="#">Throne</a><a class="button votefiefdom" href="#">Fiefdom</a><a class="button votecourt" href="#">Court</a>');
			} else {
				$("#popup2Content").html('<h2>Please choose where to move '+battle.attacker+' to the bottom of the track</h2><div id="copytrack"></div><a class="button votethrone" href="#">Throne</a><a class="button votefiefdom" href="#">Fiefdom</a><a class="button votecourt" href="#">Court</a>');
			};
			$("#popup2Error").html('');
			$("#copytrack").html(track.innerHTML);
			//centering with css  
			topPopup2();  
			//load popup  
			loadPopup2();
			
			//click on Throne
			$("#popup2Content a.votethrone").click(function(){
				$.get('php/doran_throne.php',{id: game_id, terr: terr, table: house}, function(){
					myInterval = setInterval("refresh();", 3000);
				});
				disablePopup2();
				battle.currentplayer = 0;
				return false;
			});
			
			//click on Fiefdom
			$("#popup2Content a.votefiefdom").click(function(){
				$.get('php/doran_fiefdom.php',{id: game_id, terr: terr, table: house}, function(){
					myInterval = setInterval("refresh();", 3000);
				});
				disablePopup2();
				return false;
			});
			
			//click on Court
			$("#popup2Content a.votecourt").click(function(){
				$.get('php/doran_court.php',{id: game_id, terr: terr, table: house}, function(){
					myInterval = setInterval("refresh();", 3000);
				});
				disablePopup2();
				return false;
			});
		} else
		//if you are playing Queen
		if (myhouse == battle.currentplayer && ((battle.attacker == myhouse && battle.acard == 'Queen') || (battle.defender == myhouse && battle.dcard == 'Queen')) && faza == 9) {
			clearInterval(myInterval);
			
			$("#popup2Content").html('<h2>Choose where to remove one of your opponent`s Order token</h2><form id="queenform" class="clearfix"></form>');
			
			//if i am attacker
			if (battle.acard == 'Queen') {
				if (battle.defender == 'Baratheon') {
					var enemycontrol = 'B';
				} else if (battle.defender == 'Stark') {
					var enemycontrol = 'S';
				} else if (battle.defender == 'Greyjoy') {
					var enemycontrol = 'G';
				} else if (battle.defender == 'Tyrell') {
					var enemycontrol = 'T';
				} else if (battle.defender == 'Lannister') {
					var enemycontrol = 'L';
				} else if (battle.defender == 'Martell') {
					var enemycontrol = 'M';
				}
			} else
			//if i am defender
			if (battle.dcard == 'Queen') {
				if (battle.attacker == 'Baratheon') {
					var enemycontrol = 'B';
				} else if (battle.attacker == 'Stark') {
					var enemycontrol = 'S';
				} else if (battle.attacker == 'Greyjoy') {
					var enemycontrol = 'G';
				} else if (battle.attacker == 'Tyrell') {
					var enemycontrol = 'T';
				} else if (battle.attacker == 'Lannister') {
					var enemycontrol = 'L';
				} else if (battle.attacker == 'Martell') {
					var enemycontrol = 'M';
				}
			};
			//determine adjacent territory with enemy orders
			for (name in units) {
				if (units[name].control == enemycontrol && (karta[battle.target][name] == 1 || karta[battle.target][name] == 2 || karta[battle.target][name] == 3 || karta[battle.target][name] == 5) && units[name].prikaz != 0 && name != battle.starting) {
					$("#queenform").append('<div class="supzone"><h4>'+name+'</h4><div class="supunitsdiv clearfix" id="'+name+'-units"></div></div>');
					var supterr = 'units.'+name+'.';
					var supcon = eval('units.'+name+'.control');
					placeunitbattle(supterr, name+'-units', supcon);
					$('#'+name+'-units').append('<div class="order'+ units[name].prikaz +' order"></div>');
				}
			}
			if ($("#queenform").html() == '') {
				$.get('php/queen_no.php',{id: game_id, terr: terr, table: house}, function(){
					myInterval = setInterval("refresh();", 3000);
				});
			}
			$("#popup2Content form .supzone").click(function() {
				var terrname = $(this).children('h4').html();
				$.get('php/queen_order.php',{id: game_id, terr: terr, table: house, mesto: terrname}, function(){
					myInterval = setInterval("refresh();", 3000);
				});
				disablePopup2();
				return false;
			});
			topPopup2();
			loadPopup2(); 
			
		}
	});
};

//Valyrian Steel Blade phase refresh
function valyrianrefresh() {
	$.getJSON('php/game_refresh9.php', {id: game_id}, function(json){
		battle = json;
		faza = parseInt(json.faza);
		if (faza == 6) {
			$('#phase').html('Marches');
			$('#now').html('updating...');
            disablePopup();
            if ($('#'+json.target).hasClass('battle')) {
                $('#'+json.target).removeClass('battle');
            }
		} else if (faza == 11) {
			$('#phase').html('Combat resolution');
			$('#now').html('Loser');
		} else if (faza == 12) {
			$('#phase').html('Retreat');
			$('#now').html('updating...');
            disablePopup();
		} else if (faza == 13) {
			$('#phase').html('Clean Up');
			$('#now').html('updating...');
            disablePopup();
		} else if (faza == 14) {
			$('#phase').html('Consolidate Powers');
			$('#now').html('updating...');
            disablePopup();
            if ($('#'+json.target).hasClass('battle')) {
                $('#'+json.target).removeClass('battle');
            }
		}
		
		if ($('#'+json.target).hasClass('battle')) {}
        else if (faza == 10) {
			$('#'+json.target).addClass('battle');
		}
		
		//popup with info about battle
		$("#popupContent").html('<table style="margin-top:10px;" width="600" border="1" align="center"><tr><th colspan="2" scope="col"><p>Battle on '+json.target+'</p></th></tr><tr><td align="center" valign="middle">Attacker</td><td align="center" valign="middle">Defender</td></tr><tr><td align="center" valign="middle">'+json.attacker+'</td><td align="center" valign="middle">'+json.defender+'</td></tr><tr><td id="aunits"></td><td id="dunits"></td></tr><tr><td id="aorder"></td><td id="dorder"></td></tr><tr><td id="asupport"></td><td id="dsupport"></td></tr><tr><th colspan="2" scope="col"><p>Total Combat Strength</p></th></tr><tr><td align="center" valign="middle">'+json.aCS+'</td><td align="center" valign="middle">'+json.dCS+'</td></tr><tr><td align="center" valign="middle"><div id="'+json.acard+'" class="hcard"></div></td><td align="center" valign="middle"><div id="'+json.dcard+'" class="hcard"></div></td></tr><tr><th colspan="2" id="battlewinner"></th></tr></table>');
		
		//fill attacking and defending units
		var tempbattle = 'battle.a';
		var tempcontrol = eval('units.'+json.starting+'.control');
		placeunitbattle(tempbattle, 'aunits', tempcontrol);
		
		var tempbattle = 'battle.d';
		var tempcontrol = eval('units.'+json.target+'.control');
		placeunitbattle(tempbattle, 'dunits', tempcontrol);
		
		$("#aorder").html('<div class="order'+ battle.aorder +' order"></div>');
		$("#dorder").html('<div class="order'+ battle.dorder +' order"></div>');
		
		if (battle.garrison != 0) {
			placegar('battle.', 'dunits');
		}
		//fill supporting units
		for (i=1; i<8; i++) {
			if (eval('battle.asup'+i) != 0) {
				var supterr = 'units.'+eval('battle.asup'+i)+'.';
				var supcon = eval('units.'+eval('battle.asup'+i)+'.control');
				placeunitbattle(supterr, 'asupport', supcon);
			}
			if (eval('battle.dsup'+i) != 0) {
				var supterr = 'units.'+eval('battle.dsup'+i)+'.';
				var supcon = eval('units.'+eval('battle.dsup'+i)+'.control');
				placeunitbattle(supterr, 'dsupport', supcon);
			}
		}
		$("#popupError").html('');
		if (faza == 10) {
            //centering with css
            centerPopup();
            //load popup
            loadPopup();
        }
		
		//if you have Valyrian Steel Blade
		if (myhouse == battle.currentplayer && faza == 10) {
			clearInterval(myInterval);
			$("#popup2Content").html('<h2>Use Valyrian Steel Blade?</h2><a class="button yes" href="#">Yes</a><a class="button no" href="#">No</a>');
			$("#popup2Error").html('');

            if (eval('houses.'+myhouse+'.ready') == 0) {
                //centering with css
                centerPopup2();
                //load popup
                loadPopup2();
            }
			
			//click on Yes
			$("#popup2Content a.yes").click(function(){
				$.get('php/valyrian_yes.php',{id: game_id, house: house, terr: terr});
				disablePopup2();
				myInterval = setInterval("refresh();", 3000);
                eval('houses.'+myhouse+'.ready = 1');
				return false;
			});
			
			//click on No
			$("#popup2Content a.no").click(function(){
				$.get('php/valyrian_no.php',{id: game_id, house: house, terr: terr});
				disablePopup2();
				myInterval = setInterval("refresh();", 3000);
                eval('houses.'+myhouse+'.ready = 1');
				return false;
			});
		} else
		//if no one have VSB
		if (battle.currentplayer == 0 &&(battle.attacker == myhouse || battle.defender == myhouse) && faza == 10) {
			clearInterval(myInterval);
			
			if (battle.aCS > battle.dCS) {
				$("#battlewinner").html('<p>Winner: '+battle.attacker+'</p>');
			} else if (battle.aCS < battle.dCS) {
				$("#battlewinner").html('<p>Winner: '+battle.defender+'</p>');
			} else {
				for (i=0; i<5; i++) {
					if (fiefdom[i] == battle.attacker) {
						$("#battlewinner").html('<p>Winner: '+battle.attacker+'</p>');
						break;
					} else if (fiefdom[i] == battle.defender) {
						$("#battlewinner").html('<p>Winner: '+battle.defender+'</p>');
						break;
					}
				}
			}
			$("#popupContent").append('<a id="battleOk" class="button">OK</a>');
			$('#battleOk').click(function() {
				$.get('php/valyrian_ok.php',{id: game_id, house: house, terr: terr});
                disablePopup();
				myInterval = setInterval("refresh();", 3000);
                return false;
			});
			centerPopup();
		}
		
	});
};

//Take casualties phase
function casualstiesrefresh() {
	$.getJSON('php/game_refresh9.php', {id: game_id}, function(json){
		battle = json;
		faza = parseInt(json.faza);
		$('#now').html(battle.currentplayer);
		if (faza == 6) {
			$('#phase').html('Marches');
			$('#now').html('updating...');
            disablePopup();
            if ($('#'+json.target).hasClass('battle')) {
                $('#'+json.target).removeClass('battle');
            }
		} else if (faza == 12) {
			$('#phase').html('Retreat');
			$('#now').html('updating...');
            disablePopup();
		} else if (faza == 13) {
			$('#phase').html('Clean Up');
			$('#now').html('updating...');
            disablePopup();
		} else if (faza == 14) {
			$('#phase').html('Consolidate Powers');
			$('#now').html('updating...');
            disablePopup();
            if ($('#'+json.target).hasClass('battle')) {
                $('#'+json.target).removeClass('battle');
            }
		}

        if ($('#'+json.target).hasClass('battle')) {}
        else if (faza == 11) {
            $('#'+json.target).addClass('battle');
        }
		
		//popup with info about battle
		$("#popupContent").html('<table style="margin-top:10px;" width="600" border="1" align="center"><tr><th colspan="2" scope="col"><p>Battle on '+json.target+'</p></th></tr><tr><td align="center" valign="middle">Attacker</td><td align="center" valign="middle">Defender</td></tr><tr><td align="center" valign="middle">'+json.attacker+'</td><td align="center" valign="middle">'+json.defender+'</td></tr><tr><td id="aunits"></td><td id="dunits"></td></tr><tr><td id="aorder"></td><td id="dorder"></td></tr><tr><td id="asupport"></td><td id="dsupport"></td></tr><tr><th colspan="2" scope="col"><p>Total Combat Strength</p></th></tr><tr><td align="center" valign="middle">'+json.aCS+'</td><td align="center" valign="middle">'+json.dCS+'</td></tr><tr><td align="center" valign="middle"><div id="'+json.acard+'" class="hcard"></div></td><td align="center" valign="middle"><div id="'+json.dcard+'" class="hcard"></div></td></tr><tr><th colspan="2" id="battlewinner"></th></tr></table>');
		
		//fill attacking and defending units
		var tempbattle = 'battle.a';
		var tempcontrol = eval('units.'+json.starting+'.control');
		placeunitbattle(tempbattle, 'aunits', tempcontrol);
		
		var tempbattle = 'battle.d';
		var tempcontrol = eval('units.'+json.target+'.control');
		placeunitbattle(tempbattle, 'dunits', tempcontrol);
		
		$("#aorder").html('<div class="order'+ battle.aorder +' order"></div>');
		$("#dorder").html('<div class="order'+ battle.dorder +' order"></div>');
		
		if (battle.garrison != 0) {
			placegar('battle.', 'dunits');
		}
		//fill supporting units
		for (i=1; i<8; i++) {
			if (eval('battle.asup'+i) != 0) {
				var supterr = 'units.'+eval('battle.asup'+i)+'.';
				var supcon = eval('units.'+eval('battle.asup'+i)+'.control');
				placeunitbattle(supterr, 'asupport', supcon);
			}
			if (eval('battle.dsup'+i) != 0) {
				var supterr = 'units.'+eval('battle.dsup'+i)+'.';
				var supcon = eval('units.'+eval('battle.dsup'+i)+'.control');
				placeunitbattle(supterr, 'dsupport', supcon);
			}
		}
		//winner
		$("#battlewinner").html('<p>Winner: '+battle.winner+'</p>');
		$("#popupError").html('');

        if (faza == 11) {
            //centering with css
            centerPopup();
            //load popup
            loadPopup();
        }
		
		//if winner have Cersei
		if (myhouse == battle.currentplayer && faza == 11 && myhouse == battle.winner && ((battle.acard == 'Cersei' && myhouse == battle.attacker) || (battle.dcard == 'Cersei' && myhouse == battle.defender))) {
			clearInterval(myInterval);
			
			$("#popup2Content").html('<h2>Choose where to remove one of your opponent`s Order token</h2><form id="queenform" class="clearfix"></form>');
			
			//if i am attacker
			if (battle.acard == 'Cersei') {
				if (battle.defender == 'Baratheon') {
					var enemycontrol = 'B';
				} else if (battle.defender == 'Stark') {
					var enemycontrol = 'S';
				} else if (battle.defender == 'Greyjoy') {
					var enemycontrol = 'G';
				} else if (battle.defender == 'Tyrell') {
					var enemycontrol = 'T';
				} else if (battle.defender == 'Lannister') {
					var enemycontrol = 'L';
				} else if (battle.defender == 'Martell') {
					var enemycontrol = 'M';
				}
			} else
			//if i am defender
			if (battle.dcard == 'Cersei') {
				if (battle.attacker == 'Baratheon') {
					var enemycontrol = 'B';
				} else if (battle.attacker == 'Stark') {
					var enemycontrol = 'S';
				} else if (battle.attacker == 'Greyjoy') {
					var enemycontrol = 'G';
				} else if (battle.attacker == 'Tyrell') {
					var enemycontrol = 'T';
				} else if (battle.attacker == 'Lannister') {
					var enemycontrol = 'L';
				} else if (battle.attacker == 'Martell') {
					var enemycontrol = 'M';
				}
			};
			//determine adjacent territory with enemy orders
			for (name in units) {
				if (units[name].control == enemycontrol && units[name].prikaz != 0 && name != battle.starting) {
					$("#queenform").append('<div class="supzone"><h4>'+name+'</h4><div class="supunitsdiv clearfix" id="'+name+'-units"></div></div>');
					var supterr = 'units.'+name+'.';
					var supcon = eval('units.'+name+'.control');
					placeunit(supterr, name+'-units', supcon);
					$('#'+name+'-units').append('<div class="order'+ units[name].prikaz +' order"></div>');
				}
			}
			
			topPopup2();
			loadPopup2();
			
			if ($("#queenform").html() == '') {
				$.get('php/cersei_no.php',{id: game_id, terr: terr, house: house}, function(){
					myInterval = setInterval("refresh();", 3000);
				});
				disablePopup2();
			}
			$("#popup2Content form .supzone").click(function() {
				var terrname = $(this).children('h4').html();
				$.get('php/cersei_order.php',{id: game_id, terr: terr, house: house, mesto: terrname}, function(){
					myInterval = setInterval("refresh();", 3000);
				});
				disablePopup2();
				return false;
			});
		} else
		//if you have casualties
		if (myhouse == battle.currentplayer && faza == 11 && myhouse != battle.winner) {
			clearInterval(myInterval);
			var deadman = new Array( 0, 0, 0, 0);
			var kills = battle['1ready'];
			$("#popup2Content").html('<h2>Choose your casualties:</h2><div id="deadunits" class="clearfix"></div><a id="casualties" class="button" href="#">Ok</a>');
			if (myhouse == battle.attacker) {
				var tempbattle = 'battle.a';
				placeunitcas(tempbattle, 'deadunits', mycontrol);
			} else {
				var tempbattle = 'battle.d';
				placeunitcas(tempbattle, 'deadunits', mycontrol);
			}
			$("#popup2Error").html('');
			//centering with css
			centerPopup2();
			//load popup
			loadPopup2();
			
			//click on unit
			$("#deadunits div.selectunit").click(function(){
				var nomer = $(this).html();
				nomer = nomer.replace(/unit/, '');
				
				if ($(this).hasClass('selected')) {
					$(this).removeClass('selected');
					deadman[nomer-1] = 0;
					kills++;
				} else if (kills > 0) {
					$(this).addClass('selected');
					deadman[nomer-1] = $(this).html();
					kills--;
				}
				return false;
			});
			//click on Ok
			$("#casualties").click(function(){
				if (kills == 0) {
					if (myhouse == battle.attacker) {
						for (j=0; j<4; j++) {
							if (deadman[j] != 0) {
								deadman[j] = 'a'+deadman[j];
							}
						}
					} else {
						for (j=0; j<4; j++) {
							if (deadman[j] != 0) {
								deadman[j] = 'd'+deadman[j];
							}
						}
					}
					$.get('php/take_cas.php',{id: game_id, unit1:deadman[0], unit2:deadman[1], unit3:deadman[2], unit4:deadman[3], terr:terr, house:house});
					disablePopup2();
					myInterval = setInterval("refresh();", 3000);
				}
				return false;
			});
		}
	});
};

//retreat phase refresh
function retreatrefresh() {
	$.getJSON('php/game_refresh12.php', {id: game_id}, function(json){
		battle = json;
		faza = parseInt(json.faza);
		$('#now').html(battle.currentplayer);
		if (faza == 6) {
			$('#phase').html('Marches');
			$('#now').html('updating...');
            if ($('#'+json.target).hasClass('battle')) {
                $('#'+json.target).removeClass('battle');
            }
		} else if (faza == 13) {
			$('#phase').html('Clean Up');
			$('#now').html('updating...');
		} else if (faza == 14) {
			$('#phase').html('Consolidate Powers');
			$('#now').html('updating...');
            if ($('#'+json.target).hasClass('battle')) {
                $('#'+json.target).removeClass('battle');
            }
		}
		
		//influence track setup
		for (i=0; i<6; i++){
			throne[i] = eval('json.throne'+(i+1));
		}
		for (i=0; i<6; i++){
			fiefdom[i] = eval('json.fiefdom'+(i+1));
		}
		for (i=0; i<6; i++){
			court[i] = eval('json.court'+(i+1));
		}
		
		i=0;
		$('#track table tr:eq(0) td').each(function() {
			$(this).html('<div class="' + throne[i] + '-track token"></div>');
			i++;
		});
		i=0;
		$('#track table tr:eq(1) td').each(function() {
			$(this).html('<div class="' + fiefdom[i] + '-track token"></div>');
			i++;
		});
		i=0;
		$('#track table tr:eq(2) td').each(function() {
			$(this).html('<div class="' + court[i] + '-track token"></div>');
			i++;
		});
		
		//uniq tokens setup
		$('#'+throne[0]+'-throne').show();
		$('#'+fiefdom[0]+'-blade').show();
		$('#'+court[0]+'-raven').show();


		blade = json.Blade;
		if (blade == 1) {
			$('#'+fiefdom[0]+'-blade').addClass('discarded');
		} else {
			$('#'+fiefdom[0]+'-blade').removeClass('discarded');
		}
		//objects on map setup
		mapsetup();

        if ($('#'+json.target).hasClass('battle')) {}
        else if (faza == 12) {
            $('#'+json.target).addClass('battle');
        }
		//you are retreating
		if (myhouse == battle.currentplayer && faza == 12 && myhouse != battle.winner) {
			clearInterval(myInterval);
			starting = json.target;
			renewkarta(starting, mycontrol);
			
			$("#popup2Content").html('<h2>Choose your retreat area</h2>');
			$("#popup2Error").html('');
			//centering with css
			topPopup2();
			//load popup
			load2Popup2();
		//Robb choose enemy retreat area if win
		} else if (myhouse == battle.currentplayer && faza == 12 && myhouse == battle.winner) {
			clearInterval(myInterval);
			starting = json.target;
			retreater = new Array( 0, 0, 0, 0);
			if (battle.acard == 'Robb') {
				if (battle.defender == 'Baratheon') {
					var enemycontrol = 'B';
					var enemyhouse = 'Baratheon';
				} else if (battle.defender == 'Stark') {
					var enemycontrol = 'S';
					var enemyhouse = 'Stark';
				} else if (battle.defender == 'Greyjoy') {
					var enemycontrol = 'G';
					var enemyhouse = 'Greyjoy';
				} else if (battle.defender == 'Tyrell') {
					var enemycontrol = 'T';
					var enemyhouse = 'Tyrell';
				} else if (battle.defender == 'Lannister') {
					var enemycontrol = 'L';
					var enemyhouse = 'Lannister';
				} else if (battle.defender == 'Martell') {
					var enemycontrol = 'M';
					var enemyhouse = 'Martell';
				}
				retreater[0] = battle.dunit1;
				retreater[1] = battle.dunit2;
				retreater[2] = battle.dunit3;
				retreater[3] = battle.dunit4;
			} else
			//if i am defender
			if (battle.dcard == 'Robb') {
				if (battle.attacker == 'Baratheon') {
					var enemycontrol = 'B';
					var enemyhouse = 'Baratheon';
				} else if (battle.attacker == 'Stark') {
					var enemycontrol = 'S';
					var enemyhouse = 'Stark';
				} else if (battle.attacker == 'Greyjoy') {
					var enemycontrol = 'G';
					var enemyhouse = 'Greyjoy';
				} else if (battle.attacker == 'Tyrell') {
					var enemycontrol = 'T';
					var enemyhouse = 'Tyrell';
				} else if (battle.attacker == 'Lannister') {
					var enemycontrol = 'L';
					var enemyhouse = 'Lannister';
				} else if (battle.attacker == 'Martell') {
					var enemycontrol = 'M';
					var enemyhouse = 'Martell';
				}
				retreater[0] = battle.aunit1;
				retreater[1] = battle.aunit2;
				retreater[2] = battle.aunit3;
				retreater[3] = battle.aunit4;
			};
			renewkarta(starting, enemycontrol);
			
			$("#popup2Content").html('<h2>Available areas to retreat:</h2><ul id="retreatarea"></ul>');
			allowed = [];
			//determine adjacent territory with enemy orders
			ableretreat(retreater, enemycontrol, enemyhouse);
			
			if (allowed == 0) {//kill 1st unit
				killsome(retreater);
				retreater.sort(compare);
				if (retreater[0] != 0) {
					ableretreat(retreater, enemycontrol, enemyhouse);
				} else {
					$.get('php/retreat_no.php',{terr: terr, id: game_id, house:house});
					retreatphaseend();
					return;
				};
			};
			if (allowed == 0 && retreater[0] != 0) {//kill 2nd unit
				killsome(retreater);
				retreater.sort(compare);
				if (retreater[0] != 0) {
					ableretreat(retreater, enemycontrol, enemyhouse);
				} else {
					$.get('php/retreat_no.php',{terr: terr, id: game_id, house:house});
					retreatphaseend();
					return;
				};
			};
			if (allowed == 0 && retreater[0] != 0) {//kill 3rd unit
				killsome(retreater);
				retreater.sort(compare);
				if (retreater[0] != 0) {
					ableretreat(retreater, enemycontrol, enemyhouse);
				} else {
					$.get('php/retreat_no.php',{terr: terr, id: game_id, house:house});
					retreatphaseend();
					return;
				};
			};
			if (allowed == 0 && retreater[0] != 0) {//nowhere to run
				$.get('php/retreat_no.php',{terr: terr, id: game_id, house:house});
				retreatphaseend();
				return;
			};
			
			$("#popup2Error").html('<p>Enemy units:</p>');
			if (retreater[0] != 0) {
				if (retreater[0] == 'K0') {
					$("#popup2Error").append('<div class="'+ enemycontrol + 'K1 knight"></div>');
				} else if (retreater[0] == 'F0') {
					$("#popup2Error").append('<div class="'+ enemycontrol + 'F1 footman"></div>');
				} else if (retreater[0] == 'S0') {
					$("#popup2Error").append('<div class="'+ enemycontrol + 'S1 ship"></div>');
				};
				if (retreater[1] != 0) {
					if (retreater[1] == 'K0') {
						$("#popup2Error").append('<div class="'+ enemycontrol + 'K1 knight"></div>');
					} else if (retreater[1] == 'F0') {
						$("#popup2Error").append('<div class="'+ enemycontrol + 'F1 footman"></div>');
					} else if (retreater[1] == 'S0') {
						$("#popup2Error").append('<div class="'+ enemycontrol + 'S1 ship"></div>');
					};
					if (retreater[2] != 0) {
						if (retreater[2] == 'K0') {
							$("#popup2Error").append('<div class="'+ enemycontrol + 'K1 knight"></div>');
						} else if (retreater[2] == 'F0') {
							$("#popup2Error").append('<div class="'+ enemycontrol + 'F1 footman"></div>');
						} else if (retreater[2] == 'S0') {
							$("#popup2Error").append('<div class="'+ enemycontrol + 'S1 ship"></div>');
						};
						if (retreater[3] != 0) {
							if (retreater[3] == 'K0') {
								$("#popup2Error").append('<div class="'+ enemycontrol + 'K1 knight"></div>');
							} else if (retreater[3] == 'F0') {
								$("#popup2Error").append('<div class="'+ enemycontrol + 'F1 footman"></div>');
							} else if (retreater[3] == 'S0') {
								$("#popup2Error").append('<div class="'+ enemycontrol + 'S1 ship"></div>');
							};
						}
					}
				}
			}
			//centering with css
			topPopup2();
			//load popup
			load2Popup2();
		}
	});	
};

//clean up battle phase refresh
function cleanuprefresh() {
	$.getJSON('php/game_refresh9.php', {id: game_id}, function(json){
		battle = json;
		faza = parseInt(json.faza);
		$('#now').html(battle.currentplayer);
		if (faza == 6) {
			$('#phase').html('Marches');
			$('#now').html('updating...');
		} else if (faza == 14) {
			$('#phase').html('Consolidate Powers');
			$('#now').html('updating...');
		}
		
		//objects on map setup
		mapsetup();
		//houses info setup
		housesinfo();
		
		if ($('#'+json.target).hasClass('battle')) {
            $('#'+json.target).removeClass('battle');
        }
		//Renly can upgrade FM to KN if win
		if (myhouse == battle.currentplayer && ((battle.attacker == myhouse && battle.acard == 'Renly') || (battle.defender == myhouse && battle.dcard == 'Renly')) && faza == 13 && myhouse == battle.winner && battle['1ready'] == 0) {
			clearInterval(myInterval);
			
			$("#popup2Content").html('<h2>Where you want to upgrade Footman to a Knight</h2><ul id="upgradearea"></ul>');
			if (battle.acard == 'Renly') {
				if (battle.aunit1 == 'F1' || battle.aunit2 == 'F1' || battle.aunit3 == 'F1' || battle.aunit4 == 'F1') {
					$('#upgradearea').append('<li class="button">'+battle.target+'</li>');
				};
				for (i=1; i<8; i++) {
					var tempsup = eval('battle.asup'+i);
					if (tempsup != 0) {
						if (eval('units.'+tempsup+'.control') == 'B') {
							if (eval('units.'+tempsup+'.unit1') == 'F1' || eval('units.'+tempsup+'.unit2') == 'F1' || eval('units.'+tempsup+'.unit3') == 'F1' || eval('units.'+tempsup+'.unit4') == 'F1') {
								$('#upgradearea').append('<li class="button">'+tempsup+'</li>');
							};
						}
					}
				}
			} else if (battle.dcard == 'Renly') {
				if (battle.dunit1 == 'F1' || battle.dunit2 == 'F1' || battle.dunit3 == 'F1' || battle.dunit4 == 'F1') {
					$('#upgradearea').append('<li class="button">'+battle.target+'</li>');
				};
				for (i=1; i<8; i++) {
					var tempsup = eval('battle.dsup'+i);
					if (tempsup != 0) {
						if (eval('units.'+tempsup+'.control') == 'B') {
							if (eval('units.'+tempsup+'.unit1') == 'F1' || eval('units.'+tempsup+'.unit2') == 'F1' || eval('units.'+tempsup+'.unit3') == 'F1' || eval('units.'+tempsup+'.unit4') == 'F1') {
								$('#upgradearea').append('<li class="button">'+tempsup+'</li>');
							};
						}
					}
				}
			};
			
			if ($('#upgradearea').html() == '' || !knightslimit(mycontrol)) {
				$.get('php/renly_no.php',{id: game_id, terr:terr, house:house});
				disablePopup2();
				myInterval = setInterval("refresh();", 3000);
				return;
			} else {
				$("#upgradearea li").click(function(){
					var upgarea = $(this).html();
					$.get('php/renly_upgrade.php',{id: game_id, terr:terr, house:house, target:upgarea});
					disablePopup2();
					myInterval = setInterval("refresh();", 3000);
					return false;
				});
			};
			
			//centering with css
			centerPopup2();
			//load popup
			loadPopup2();
		} else
		//Patchface
		if (myhouse == battle.currentplayer && ((battle.attacker == myhouse && battle.acard == 'Patchface') || (battle.defender == myhouse && battle.dcard == 'Patchface')) && faza == 13 && battle['1ready'] == 0) {
			clearInterval(myInterval);
			
			$("#popup2Content").html('<h2>Choose card to discard!</h2><h3>Enemy available cards:</h3><div class="clearfix" id="mycards"></div>');
			$("#popup2Error").html('');
			
			if (battle.attacker == myhouse) {
				drawcards(battle.defender, '#mycards');
			} else {
				drawcards(battle.attacker, '#mycards');
			}
			
			$('#mycards div.hcard').click(function() {
				var hero = this.id;
				$.get('php/choose_patchfaced.php', {id: game_id, hero: hero, house: house, terr: terr});
				disablePopup2();
				myInterval = setInterval("refresh();", 3000);
			});
			
			//centering with css
			centerPopup2();
			//load popup
			loadPopup2();
		} else
		//Capture port
		if (myhouse == battle.currentplayer && faza == 13 && battle['1ready'] == 1) {
			clearInterval(myInterval);
			
			var targetport = battle.target+'Port';
			var ship = new Array( 0, 0, 0, 0);
			//units selection
			$("#popup2Content").html('<p>Click on ship to capture:</p>');
			var tempval = 'units.'+targetport+'.';
			placeunitport(tempval, 'popup2Content', mycontrol);
			$("#popup2Content").append('<div class="clearfix"></div><p>All not captured ships will be destroyed!</p><a class="button Select" href="#">OK</a>');
			$("#popup2Error").html('');
			//centering with css  
			centerPopup2();  
			//load popup  
			loadPopup2();
			
			//click on unit
			$("#popup2Content div.selectunit").click(function(){
				var nomer = $(this).html();
				nomer = nomer.replace(/unit/, '');
				
				if ($(this).hasClass('selected')) {
					$(this).removeClass('selected');
					ship[nomer-1] = 0;
				} else {
					$(this).addClass('selected');
					ship[nomer-1] = $(this).html();
				}
				
				return false;
			});
			
			//click on Select button
			$("#popup2Content a.Select").click(function(){
				ship.sort(compare);
				
				//make backup
				var portbackup = cloneObj(eval('units.'+targetport));
				
				
				//forming new units object
				eval('units.'+targetport+'.unit1 = 0');
				eval('units.'+targetport+'.unit2 = 0');
				eval('units.'+targetport+'.unit3 = 0');
				eval('units.'+targetport+'.unit4 = 0');
				if (ship[0] != 0) {
					eval('units.'+targetport+'.unit1 = "'+portbackup[ship[0]]+'"');
					if (ship[1] != 0) {
						eval('units.'+targetport+'.unit2 = "'+portbackup[ship[1]]+'"');
						if (ship[2] != 0) {
							eval('units.'+targetport+'.unit3 = "'+portbackup[ship[2]]+'"');
							if (ship[3] != 0) {
								eval('units.'+targetport+'.unit4 = "'+portbackup[ship[3]]+'"');
							}
						}
					}
				}
				eval('units.'+targetport+'.control = "'+mycontrol+'"');
				
				//check new limits
				if (supplylimit(mycontrol, myhouse)) {
					//objects on map setup
					$('#board .water').each(function() {
						$(this).html('');
						var tempval = 'units.'+$(this).attr("id")+'.';
						var house = eval('units.'+$(this).attr("id")+'.control');
						placeunit(tempval, $(this).attr("id"), house);
					});
					$.get('php/capture_port2.php',{table: terr, target:targetport, unit1:ship[0], unit2:ship[1], unit3:ship[2], unit4:ship[3], control:mycontrol, id: game_id});
					disablePopup2();
					myInterval = setInterval("refresh();", 3000);
				} else {
					$("#popup2Error").html('<p>Not enough supply!</p>');
					eval('units.'+targetport+' = cloneObj(portbackup)');
					ship = [ 0, 0, 0, 0];
					$("#popup2Content div.selectunit").removeClass('selected');
				}
				return false;
			});
		}
	});
};

//consolidate power phase refresh
function consolidaterefresh() {
	$.getJSON('php/game_refresh14.php', {id: game_id, table:terr, house:house}, function(json){
		faza = parseInt(json.faza);
		if (faza == 0) {
			$('#phase').html('Westeros Card 1');
			$('#now').html('updating...');
			turn = turn+1;
			$('#turn').html(turn+1);
		} else if (faza == 1) {
			$('#phase').html('Westeros Card 2');
			$('#now').html('updating...');
			turn = turn+1;
			$('#turn').html(turn+1);
		} else if (faza == 2) {
			$('#phase').html('Westeros Card 3');
			$('#now').html('updating...');
			turn = turn+1;
			$('#turn').html(turn+1);
		};
		
		$('#BaratheonPT').html(json.Baratheon.tokih);
		$('#GreyjoyPT').html(json.Greyjoy.tokih);
		$('#LannisterPT').html(json.Lannister.tokih);
		$('#MartellPT').html(json.Martell.tokih);
		$('#StarkPT').html(json.Stark.tokih);
		$('#TyrellPT').html(json.Tyrell.tokih);
		
		currentplayer = json.currentplayer;
		$('#now').html(currentplayer);
		
		mapsetup();
	});
};

//call fo support phase refresh
function supneutralrefresh() {
	$.getJSON('php/game_refresh15.php', {id: game_id}, function(json){
		battle = json;
		faza = parseInt(json.faza);
		if (faza == 6) {
			$('#phase').html('Marches');
			disablePopup();
		} else if (faza == 14) {
			$('#phase').html('Consolidate Powers');
			$('#now').html('updating...');
			disablePopup();
		}
		
		currentplayer = json.currentplayer;
		
		$('#now').html(currentplayer);
		
		//popup with info about battle
		$("#popupContent").html('<table style="margin-top:10px;" width="600" border="1" align="center"><tr><th colspan="2" scope="col"><p>Battle on '+json.target+'</p></th></tr><tr><td align="center" valign="middle">Attacker</td><td align="center" valign="middle">Defender</td></tr><tr><td align="center" valign="middle">'+json.attacker+'</td><td align="center" valign="middle">'+json.target+'</td></tr><tr><td id="aunits"></td><td id="dunits"></td></tr><tr><td id="aorder"></td><td id="dorder"></td></tr><tr><td id="asupport"></td><td id="dsupport"></td></tr></table>');
		
		//fill attacking and defending units
		var tempbattle = 'battle.a';
		var tempcontrol = eval('units.'+json.starting+'.control');
		placeunitbattle(tempbattle, 'aunits', tempcontrol);
		
		$("#aorder").html('<div class="order'+ battle.aorder +' order"></div>');
		
		if (battle.garrison != 0) {
			placegar('battle.', 'dunits');
		}
		
		//fill supporting units
		for (i=1; i<8; i++) {
			if (eval('battle.asup'+i) != 0) {
				var supterr = 'units.'+eval('battle.asup'+i)+'.';
				var supcon = eval('units.'+eval('battle.asup'+i)+'.control');
				placeunitbattle(supterr, 'asupport', supcon);
			}
		}
		$("#popupError").html('');
		
		//centering with css  
		centerPopup();  
		//load popup
		if (faza == 15) {
			loadPopup();
		};
		
		if (currentplayer == myhouse && faza == 15) {
			clearInterval(myInterval);
			$("#popup2Content").html('<h2>Choose your side:</h2><form class="clearfix"></form>');
			i = 1;
			for (name in units) {
				if (units[name].control == mycontrol && (karta[battle.target][name] == 1 || karta[battle.target][name] == 2) && (units[name].prikaz == 5 || units[name].prikaz == 10)) {
					$("#popup2Content form").append('<div class="supzone"><h4>'+name+'</h4><div class="supunitsdiv clearfix" id="'+name+'-units"></div><input type="hidden" name="zone'+i+'" value="'+name+'"/><label class="button" for="zone'+i+'-choice-1"><input type="radio" name="'+name+'" id="zone'+i+'-choice-1" tabindex="2" value="a" /> '+battle.attacker+'</label><label class="button" for="zone'+i+'-choice-2"><input type="radio" name="'+name+'" id="zone'+i+'-choice-2" tabindex="3" value="0" checked/> No one</label></div>');
					
					i++;
					var supterr = 'units.'+name+'.';
					var supcon = eval('units.'+name+'.control');
					placeunitbattle(supterr, name+'-units', supcon);
					$('#'+name+'-units').append('<div class="order'+ units[name].prikaz +' order"></div>');
				}
				
			}
			
			$("#popup2Content").append('<div id="submitsup" class="button">Apply</div>');
			$("#submitsup").click(function() {
				var supform = $("#popup2Content form").serialize();
				$.get('php/neutral_support.php?'+supform, {id: game_id});
				disablePopup2();
				myInterval = setInterval("refresh();", 3000);
				
			});
			topPopup2();
			loadPopup2(); 
		}
	});
};

//availability area to retreat
function ableretreat(attacker, enemycontrol, enemyhouse) {
	for (name in units) {
		if (((units[name].control == enemycontrol && (karta[battle.target][name] == 1 || karta[battle.target][name] == 5 || karta2[battle.target][name] == 4)) || (units[name].control == 0 && (karta[battle.target][name] == 1 || karta2[battle.target][name] == 4))) && name != battle.starting) {
			target = name;
			//make backup
			var targetbackup = cloneObj(eval('units.'+target));
			
			//forming new units object
			if (eval('units.'+target+'.unit1') == 0) {
				if (attacker[0] != 0) {
					eval('units.'+target+'.unit1 = "'+attacker[0]+'"');
					if (attacker[1] != 0) {
						eval('units.'+target+'.unit2 = "'+attacker[1]+'"');
						if (attacker[2] != 0) {
							eval('units.'+target+'.unit3 = "'+attacker[2]+'"');
							if (attacker[3] != 0) {
								eval('units.'+target+'.unit4 = "'+attacker[3]+'"');
							}
						}
					}
				}
			} else if (eval('units.'+target+'.unit2') == 0) {
				if (attacker[0] != 0) {
					eval('units.'+target+'.unit2 = "'+attacker[0]+'"');
					if (attacker[1] != 0) {
						eval('units.'+target+'.unit3 = "'+attacker[1]+'"');
						if (attacker[2] != 0) {
							eval('units.'+target+'.unit4 = "'+attacker[2]+'"');
						}
					}
				}
			} else if (eval('units.'+target+'.unit3') == 0) {
				if (attacker[0] != 0) {
					eval('units.'+target+'.unit3 = "'+attacker[0]+'"');
					if (attacker[1] != 0) {
						eval('units.'+target+'.unit4 = "'+attacker[1]+'"');
					}
				}
			} else {
				if (attacker[0] != 0) {
					eval('units.'+target+'.unit4 = "'+attacker[0]+'"');
				}
			};
			eval('units.'+target+'.control = "'+enemycontrol+'"');
			
			//check new limits
			limits = supplylimit(enemycontrol, enemyhouse);
			if (limits) {
				$('#retreatarea').append('<li>'+target+'</li>');
				allowed[allowed.length] = target;
				eval('units.'+target+' = cloneObj(targetbackup)');
			} else {
				eval('units.'+target+' = cloneObj(targetbackup)');
			};
		}
	}
};
//kill excess units
function killsome(attacker) {
	var yea = 0;
	for (i=0; i<4; i++) {
		if (attacker[i] == 'F0' || attacker[i] == 'S0') {
			attacker[i] = 0;
			yea = 1;
			break;
		}
	}
	if (yea == 0) {
		for (i=0; i<4; i++) {
			if (attacker[i] == 'K0') {
				attacker[i] = 0;
				break;
			}
		}
	}
};

//determine unit type for casualties
function detunitcas(data, id, unit, house) {
	//footman
	if (eval(data+unit)=='F0') {
		$("#"+id).append('<div class="'+ house +'F1 footman selectunit">'+unit+'</div>');
	} else {
		//knight
		if (eval(data+unit)=='K0') {
			$("#"+id).append('<div class="'+ house +'K1 knight selectunit">'+unit+'</div>');
		} else {
			//ship
			if (eval(data+unit)=='S0') {
				$("#"+id).append('<div class="'+ house +'S1 ship selectunit">'+unit+'</div>');
			}
		}
	}
}

//filling zone with units for casualties
function placeunitcas(data, id, house) {
	//unit1
	if (eval(data+'unit1') !=0) {
		detunitcas(data, id, 'unit1', house);
		//unit2
		if (eval(data+'unit2') !=0) {
			detunitcas(data, id, 'unit2', house);
			//unit3
			if (eval(data+'unit3') !=0) {
				detunitcas(data, id, 'unit3', house);
				//unit4
				if (eval(data+'unit4') !=0) {
					detunitcas(data, id, 'unit4', house);
				}
			}
		}
	}
};

//draw available cards function
function drawcards(house, side) {
	if (house == 'Stark') {
		if (houses.Stark.HC1 == 1) {
			$(side).append('<div id="Eddard" class="hcard">1</div>');
		}
		if (houses.Stark.HC2 == 1) {
			$(side).append('<div id="Robb" class="hcard">2</div>');
		}
		if (houses.Stark.HC3 == 1) {
			$(side).append('<div id="Bolton" class="hcard">3</div>');
		}
		if (houses.Stark.HC4 == 1) {
			$(side).append('<div id="Umber" class="hcard">4</div>');
		}
		if (houses.Stark.HC5 == 1) {
			$(side).append('<div id="Cassel" class="hcard">5</div>');
		}
		if (houses.Stark.HC6 == 1) {
			$(side).append('<div id="Blackfish" class="hcard">6</div>');
		}
		if (houses.Stark.HC7 == 1) {
			$(side).append('<div id="Catelyn" class="hcard">7</div>');
		}
	} else if (house == 'Lannister') {
		if (houses.Lannister.HC1 == 1) {
			$(side).append('<div id="Tywin" class="hcard">1</div>');
		}
		if (houses.Lannister.HC2 == 1) {
			$(side).append('<div id="Clegan" class="hcard">2</div>');
		}
		if (houses.Lannister.HC3 == 1) {
			$(side).append('<div id="Hound" class="hcard">3</div>');
		}
		if (houses.Lannister.HC4 == 1) {
			$(side).append('<div id="Jaime" class="hcard">4</div>');
		}
		if (houses.Lannister.HC5 == 1) {
			$(side).append('<div id="Tyrion" class="hcard">5</div>');
		}
		if (houses.Lannister.HC6 == 1) {
			$(side).append('<div id="Kevan" class="hcard">6</div>');
		}
		if (houses.Lannister.HC7 == 1) {
			$(side).append('<div id="Cersei" class="hcard">7</div>');
		}
	} else if (house == 'Greyjoy') {
		if (houses.Greyjoy.HC1 == 1) {
			$(side).append('<div id="Euron" class="hcard">1</div>');
		}
		if (houses.Greyjoy.HC2 == 1) {
			$(side).append('<div id="Victarion" class="hcard">2</div>');
		}
		if (houses.Greyjoy.HC3 == 1) {
			$(side).append('<div id="Theon" class="hcard">3</div>');
		}
		if (houses.Greyjoy.HC4 == 1) {
			$(side).append('<div id="Balon" class="hcard">4</div>');
		}
		if (houses.Greyjoy.HC5 == 1) {
			$(side).append('<div id="Asha" class="hcard">5</div>');
		}
		if (houses.Greyjoy.HC6 == 1) {
			$(side).append('<div id="Dagmar" class="hcard">6</div>');
		}
		if (houses.Greyjoy.HC7 == 1) {
			$(side).append('<div id="Aeron" class="hcard">7</div>');
		}
	} else if (house == 'Baratheon') {
		if (houses.Baratheon.HC1 == 1) {
			$(side).append('<div id="Stannis" class="hcard">1</div>');
		}
		if (houses.Baratheon.HC2 == 1) {
			$(side).append('<div id="Renly" class="hcard">2</div>');
		}
		if (houses.Baratheon.HC3 == 1) {
			$(side).append('<div id="Davos" class="hcard">3</div>');
		}
		if (houses.Baratheon.HC4 == 1) {
			$(side).append('<div id="Brienne" class="hcard">4</div>');
		}
		if (houses.Baratheon.HC5 == 1) {
			$(side).append('<div id="Melissandre" class="hcard">5</div>');
		}
		if (houses.Baratheon.HC6 == 1) {
			$(side).append('<div id="Salladhor" class="hcard">6</div>');
		}
		if (houses.Baratheon.HC7 == 1) {
			$(side).append('<div id="Patchface" class="hcard">7</div>');
		}
	} else if (house == 'Tyrell') {
		if (houses.Tyrell.HC1 == 1) {
			$(side).append('<div id="Mace" class="hcard">1</div>');
		}
		if (houses.Tyrell.HC2 == 1) {
			$(side).append('<div id="Loras" class="hcard">2</div>');
		}
		if (houses.Tyrell.HC3 == 1) {
			$(side).append('<div id="Garlan" class="hcard">3</div>');
		}
		if (houses.Tyrell.HC4 == 1) {
			$(side).append('<div id="Randyll" class="hcard">4</div>');
		}
		if (houses.Tyrell.HC5 == 1) {
			$(side).append('<div id="Alester" class="hcard">5</div>');
		}
		if (houses.Tyrell.HC6 == 1) {
			$(side).append('<div id="Margeary" class="hcard">6</div>');
		}
		if (houses.Tyrell.HC7 == 1) {
			$(side).append('<div id="Queen" class="hcard">7</div>');
		}
	}  else if (house == 'Martell') {
		if (houses.Martell.HC1 == 1) {
			$(side).append('<div id="Viper" class="hcard">1</div>');
		}
		if (houses.Martell.HC2 == 1) {
			$(side).append('<div id="Hotah" class="hcard">2</div>');
		}
		if (houses.Martell.HC3 == 1) {
			$(side).append('<div id="Obara" class="hcard">3</div>');
		}
		if (houses.Martell.HC4 == 1) {
			$(side).append('<div id="Darkstar" class="hcard">4</div>');
		}
		if (houses.Martell.HC5 == 1) {
			$(side).append('<div id="Nymeria" class="hcard">5</div>');
		}
		if (houses.Martell.HC6 == 1) {
			$(side).append('<div id="Arianne" class="hcard">6</div>');
		}
		if (houses.Martell.HC7 == 1) {
			$(side).append('<div id="Doran" class="hcard">7</div>');
		}
	}
};

//draw discard pile function
function drawpile(house, side) {
    if (house == 'Stark') {
        if (houses.Stark.HC1 == 0) {
            $(side).append('<div id="Eddard" class="hcard">1</div>');
        }
        if (houses.Stark.HC2 == 0) {
            $(side).append('<div id="Robb" class="hcard">2</div>');
        }
        if (houses.Stark.HC3 == 0) {
            $(side).append('<div id="Bolton" class="hcard">3</div>');
        }
        if (houses.Stark.HC4 == 0) {
            $(side).append('<div id="Umber" class="hcard">4</div>');
        }
        if (houses.Stark.HC5 == 0) {
            $(side).append('<div id="Cassel" class="hcard">5</div>');
        }
        if (houses.Stark.HC6 == 0) {
            $(side).append('<div id="Blackfish" class="hcard">6</div>');
        }
        if (houses.Stark.HC7 == 0) {
            $(side).append('<div id="Catelyn" class="hcard">7</div>');
        }
    } else if (house == 'Lannister') {
        if (houses.Lannister.HC1 == 0) {
            $(side).append('<div id="Tywin" class="hcard">1</div>');
        }
        if (houses.Lannister.HC2 == 0) {
            $(side).append('<div id="Clegan" class="hcard">2</div>');
        }
        if (houses.Lannister.HC3 == 0) {
            $(side).append('<div id="Hound" class="hcard">3</div>');
        }
        if (houses.Lannister.HC4 == 0) {
            $(side).append('<div id="Jaime" class="hcard">4</div>');
        }
        if (houses.Lannister.HC5 == 0) {
            $(side).append('<div id="Tyrion" class="hcard">5</div>');
        }
        if (houses.Lannister.HC6 == 0) {
            $(side).append('<div id="Kevan" class="hcard">6</div>');
        }
        if (houses.Lannister.HC7 == 0) {
            $(side).append('<div id="Cersei" class="hcard">7</div>');
        }
    } else if (house == 'Greyjoy') {
        if (houses.Greyjoy.HC1 == 0) {
            $(side).append('<div id="Euron" class="hcard">1</div>');
        }
        if (houses.Greyjoy.HC2 == 0) {
            $(side).append('<div id="Victarion" class="hcard">2</div>');
        }
        if (houses.Greyjoy.HC3 == 0) {
            $(side).append('<div id="Theon" class="hcard">3</div>');
        }
        if (houses.Greyjoy.HC4 == 0) {
            $(side).append('<div id="Balon" class="hcard">4</div>');
        }
        if (houses.Greyjoy.HC5 == 0) {
            $(side).append('<div id="Asha" class="hcard">5</div>');
        }
        if (houses.Greyjoy.HC6 == 0) {
            $(side).append('<div id="Dagmar" class="hcard">6</div>');
        }
        if (houses.Greyjoy.HC7 == 0) {
            $(side).append('<div id="Aeron" class="hcard">7</div>');
        }
    } else if (house == 'Baratheon') {
        if (houses.Baratheon.HC1 == 0) {
            $(side).append('<div id="Stannis" class="hcard">1</div>');
        }
        if (houses.Baratheon.HC2 == 0) {
            $(side).append('<div id="Renly" class="hcard">2</div>');
        }
        if (houses.Baratheon.HC3 == 0) {
            $(side).append('<div id="Davos" class="hcard">3</div>');
        }
        if (houses.Baratheon.HC4 == 0) {
            $(side).append('<div id="Brienne" class="hcard">4</div>');
        }
        if (houses.Baratheon.HC5 == 0) {
            $(side).append('<div id="Melissandre" class="hcard">5</div>');
        }
        if (houses.Baratheon.HC6 == 0) {
            $(side).append('<div id="Salladhor" class="hcard">6</div>');
        }
        if (houses.Baratheon.HC7 == 0) {
            $(side).append('<div id="Patchface" class="hcard">7</div>');
        }
    } else if (house == 'Tyrell') {
        if (houses.Tyrell.HC1 == 0) {
            $(side).append('<div id="Mace" class="hcard">1</div>');
        }
        if (houses.Tyrell.HC2 == 0) {
            $(side).append('<div id="Loras" class="hcard">2</div>');
        }
        if (houses.Tyrell.HC3 == 0) {
            $(side).append('<div id="Garlan" class="hcard">3</div>');
        }
        if (houses.Tyrell.HC4 == 0) {
            $(side).append('<div id="Randyll" class="hcard">4</div>');
        }
        if (houses.Tyrell.HC5 == 0) {
            $(side).append('<div id="Alester" class="hcard">5</div>');
        }
        if (houses.Tyrell.HC6 == 0) {
            $(side).append('<div id="Margeary" class="hcard">6</div>');
        }
        if (houses.Tyrell.HC7 == 0) {
            $(side).append('<div id="Queen" class="hcard">7</div>');
        }
    }  else if (house == 'Martell') {
        if (houses.Martell.HC1 == 0) {
            $(side).append('<div id="Viper" class="hcard">1</div>');
        }
        if (houses.Martell.HC2 == 0) {
            $(side).append('<div id="Hotah" class="hcard">2</div>');
        }
        if (houses.Martell.HC3 == 0) {
            $(side).append('<div id="Obara" class="hcard">3</div>');
        }
        if (houses.Martell.HC4 == 0) {
            $(side).append('<div id="Darkstar" class="hcard">4</div>');
        }
        if (houses.Martell.HC5 == 0) {
            $(side).append('<div id="Nymeria" class="hcard">5</div>');
        }
        if (houses.Martell.HC6 == 0) {
            $(side).append('<div id="Arianne" class="hcard">6</div>');
        }
        if (houses.Martell.HC7 == 0) {
            $(side).append('<div id="Doran" class="hcard">7</div>');
        }
    }
};

//filling zone with units and orders
function placeunitbattle(data, id, house) {
	//unit1
	if (eval(data+'unit1') !=0) {
		detunit(data, id, 'unit1', house);
		//unit2
		if (eval(data+'unit2') !=0) {
			detunit(data, id, 'unit2', house);
			//unit3
			if (eval(data+'unit3') !=0) {
				detunit(data, id, 'unit3', house);
				//unit4
				if (eval(data+'unit4') !=0) {
					detunit(data, id, 'unit4', house);
				}
			}
		}
	}
};

//Reveal Wildling Card phase refresh
function revealwcrefresh() {
    $.getJSON('php/game_refresh16.php', {id: game_id, house: house}, function(json){
        faza = parseInt(json.faza);
        $('#now').html(throne[0]);
        if (faza == 0) {
            $('#phase').html('Westeros Card 1');
            $('#now').html('updating...');
        } else if (faza == 1) {
            $('#phase').html('Westeros Card 2');
            $('#now').html('updating...');
        } else if (faza == 2) {
            $('#phase').html('Westeros Card 3');
            $('#now').html('updating...');
        } else if (faza == 3) {
            $('#phase').html('Planning');
            $('#now').html('All');
        } else if (faza == 17) {
            $('#phase').html('Wildling attack consequences');
            $('#now').html('updating...');
        } else if (faza == 18) {
            $('#phase').html('Reveal Wildling Card');
            $('#now').html('updating...');
        };

        wildcard = json.WildCard1;
        var total = json.Stark*1+json.Greyjoy*1+json.Lannister*1+json.Baratheon*1+json.Tyrell*1+json.Martell*1;
        //popup with info about attack and bids
        $("#popup2Content").html('<table style="margin-top:10px;" width="400" border="1" align="center"><tr><th colspan="2" scope="col"><p>Wildling Attack!</p></th></tr><tr><td width="250" align="center" valign="middle">Wildlings` Power</td><td align="center" valign="middle">'+(wildpower*2)+'</td></tr><tr><td width="250" align="center" valign="middle">Wildlings` Card</td><td id="WCreveal" align="center" valign="middle"></td></tr><tr><td colspan="2" scope="col" align="center" valign="middle">House`s bids</td></tr><tr><td align="center" valign="middle">Stark</td><td align="center" valign="middle">'+json.Stark+'</td></tr><tr><td align="center" valign="middle">Greyjoy</td><td align="center" valign="middle">'+json.Greyjoy+'</td></tr><tr><td align="center" valign="middle">Lannister</td><td align="center" valign="middle">'+json.Lannister+'</td></tr><tr><td align="center" valign="middle">Baratheon</td><td align="center" valign="middle">'+json.Baratheon+'</td></tr><tr><td align="center" valign="middle">Tyrell</td><td align="center" valign="middle">'+json.Tyrell+'</td></tr><tr><td align="center" valign="middle">Martell</td><td align="center" valign="middle">'+json.Martell+'</td></tr><tr><td align="center" valign="middle">Total</td><td align="center" valign="middle">'+total+'</td></tr></table>');

        if (wildcard == 0) {
            $("#WCreveal").html('Crowkillers');
        } else if (wildcard == 1) {
            $("#WCreveal").html('Silence at the Wall');
        } else if (wildcard == 2) {
            $("#WCreveal").html('Mammoth Riders');
        } else if (wildcard == 3) {
            $("#WCreveal").html('The Horde Descends');
        } else if (wildcard == 4) {
            $("#WCreveal").html('A King Beyond the Wall');
        } else if (wildcard == 5) {
            $("#WCreveal").html('Rattleshirts Raiders');
        } else if (wildcard == 6) {
            $("#WCreveal").html('Preemptive Raid');
        } else if (wildcard == 7) {
            $("#WCreveal").html('Skinchanger Scout');
        } else if (wildcard == 8) {
            $("#WCreveal").html('Massing on the Milkwater');
        };

        $("#popup2Error").html('');

        //if you are Irone Throne holder
        if (myhouse == throne[0] && myhouse != undefined && faza == 16) {
            clearInterval(myInterval);
            $("#popup2Content").append('<h3>Choose order of the houses</h3><form><ol id="bids"></ol></form><div><input id ="tiesubmit" type="submit" value="Done" class="button" /></div>');

            //click on Done
            $("#tiesubmit").click(function(){
                var bid1 = document.getElementById('select-1').value;
                var bid2 = document.getElementById('select-2').value;
                var bid3 = document.getElementById('select-3').value;
                var bid4 = document.getElementById('select-4').value;
                var bid5 = document.getElementById('select-5').value;
                var bid6 = document.getElementById('select-6').value;
                if (bid1 != bid2 && bid1 != bid3 && bid1 != bid4 && bid1 != bid5 && bid1 != bid6 && bid2 != bid3 && bid2 != bid4 && bid2 != bid5 && bid2 != bid6 && bid3 != bid4 && bid3 != bid5 && bid3 != bid6 && bid4 != bid5 && bid4 != bid6 && bid5 != bid6) {
                    $.get('php/tie_wild.php', {id: game_id, bid1: bid1, bid2: bid2, bid3: bid3, bid4: bid4, bid5: bid5, bid6: bid6, house: house});
                    disablePopup2();
                    myInterval = setInterval("refresh();", 3000);
                } else {
                    $("#popup2Error").html('Place all Houses in the desired order');
                }
                return false;
            });
            //sorting bids
            var bids = new Object();
            bids.Stark = json.Stark;
            bids.Baratheon = json.Baratheon;
            bids.Tyrell = json.Tyrell;
            bids.Greyjoy = json.Greyjoy;
            bids.Martell = json.Martell;
            bids.Lannister = json.Lannister;
            bids = asort(bids);
            var doma = new Array();
            var j = 1;
            for(i in bids) {
                doma[j] = i;
                j++;
            };
            //display uniq bids and even bids
            for (i = 1; i < 7; i++) {
                if (bids[doma[i]] != bids[doma[i+1]]) {//single
                    $("#bids").append('<li><select disabled="true" name="bid'+ i +'" id="select-'+ i +'"><option value="'+ doma[i] +'">'+ doma[i] +'</option></select></li>');
                } else if (bids[doma[i]] == bids[doma[i+1]]) {//2 even
                    $("#bids").append('<li><select name="bid'+ i +'" id="select-'+ i +'" class="select-'+ i +'"><option selected="selected" value="'+ doma[i] +'">'+ doma[i] +'</option><option value="'+ doma[i+1] +'">'+ doma[i+1] +'</option></select></li><li><select name="bid'+ (i+1) +'" id="select-'+ (i+1) +'" class="select-'+ i +'"><option value="'+ doma[i] +'">'+ doma[i] +'</option><option selected="selected" value="'+ doma[i+1] +'">'+ doma[i+1] +'</option></select></li>');
                    if (bids[doma[i]] == bids[doma[i+2]]) {//3 even
                        $("#select-"+ i).append('<option value="'+ doma[i+2] +'">'+ doma[i+2] +'</option>');
                        $("#select-"+ (i+1)).append('<option value="'+ doma[i+2] +'">'+ doma[i+2] +'</option>');
                        $("#bids").append('<li><select name="bid'+ (i+2) +'" id="select-'+ (i+2) +'" class="select-'+ i +'"><option value="'+ doma[i] +'">'+ doma[i] +'</option><option value="'+ doma[i+1] +'">'+ doma[i+1] +'</option><option selected="selected" value="'+ doma[i+2] +'">'+ doma[i+2] +'</option></select></li>');
                        if (bids[doma[i]] == bids[doma[i+3]]) {//4 even
                            $("#select-"+ i).append('<option value="'+ doma[i+3] +'">'+ doma[i+3] +'</option>');
                            $("#select-"+ (i+1)).append('<option value="'+ doma[i+3] +'">'+ doma[i+3] +'</option>');
                            $("#select-"+ (i+2)).append('<option value="'+ doma[i+3] +'">'+ doma[i+3] +'</option>');
                            $("#bids").append('<li><select name="bid'+ (i+3) +'" id="select-'+ (i+3) +'" class="select-'+ i +'"><option value="'+ doma[i] +'">'+ doma[i] +'</option><option value="'+ doma[i+1] +'">'+ doma[i+1] +'</option><option value="'+ doma[i+2] +'">'+ doma[i+2] +'</option><option selected="selected" value="'+ doma[i+3] +'">'+ doma[i+3] +'</option></select></li>');
                            if (bids[doma[i]] == bids[doma[i+4]]) {//5 even
                                $("#select-"+ i).append('<option value="'+ doma[i+4] +'">'+ doma[i+4] +'</option>');
                                $("#select-"+ (i+1)).append('<option value="'+ doma[i+4] +'">'+ doma[i+4] +'</option>');
                                $("#select-"+ (i+2)).append('<option value="'+ doma[i+4] +'">'+ doma[i+4] +'</option>');
                                $("#select-"+ (i+3)).append('<option value="'+ doma[i+4] +'">'+ doma[i+4] +'</option>');
                                $("#bids").append('<li><select name="bid'+ (i+4) +'" id="select-'+ (i+4) +'" class="select-'+ i +'"><option value="'+ doma[i] +'">'+ doma[i] +'</option><option value="'+ doma[i+1] +'">'+ doma[i+1] +'</option><option value="'+ doma[i+2] +'">'+ doma[i+2] +'</option><option value="'+ doma[i+3] +'">'+ doma[i+3] +'</option><option selected="selected" value="'+ doma[i+4] +'">'+ doma[i+4] +'</option></select></li>');
                                if (bids[doma[i]] == bids[doma[i+5]]) {//6 even
                                    $("#select-"+ i).append('<option value="'+ doma[i+5] +'">'+ doma[i+5] +'</option>');
                                    $("#select-"+ (i+1)).append('<option value="'+ doma[i+5] +'">'+ doma[i+5] +'</option>');
                                    $("#select-"+ (i+2)).append('<option value="'+ doma[i+5] +'">'+ doma[i+5] +'</option>');
                                    $("#select-"+ (i+3)).append('<option value="'+ doma[i+5] +'">'+ doma[i+5] +'</option>');
                                    $("#select-"+ (i+4)).append('<option value="'+ doma[i+5] +'">'+ doma[i+5] +'</option>');
                                    $("#bids").append('<li><select name="bid'+ (i+5) +'" id="select-'+ (i+5) +'" class="select-'+ i +'"><option value="'+ doma[i] +'">'+ doma[i] +'</option><option value="'+ doma[i+1] +'">'+ doma[i+1] +'</option><option value="'+ doma[i+2] +'">'+ doma[i+2] +'</option><option value="'+ doma[i+3] +'">'+ doma[i+3] +'</option><option value="'+ doma[i+4] +'">'+ doma[i+4] +'</option><option selected="selected" value="'+ doma[i+5] +'">'+ doma[i+5] +'</option></select></li>');
                                    i++;
                                }
                                i++;
                            }
                            i++;
                        }
                        i++;
                    }
                    i++;
                }
            }

        }
        if (faza == 16) {
            //centering with css
            centerPopup2();
            //load popup
            loadPopup2();
        } else {
            housesinfo();
            disablePopup2();
        };
    });
};

//Wildling attack consequences phase refresh
function conseqrefresh() {
    $.getJSON('php/game_refresh17.php', {id: game_id, house: house}, function(json){
        faza = parseInt(json.faza);

        if (faza == 0) {
            $('#phase').html('Westeros Card 1');
            $('#now').html('updating...');
        } else if (faza == 1) {
            $('#phase').html('Westeros Card 2');
            $('#now').html('updating...');
        } else if (faza == 2) {
            $('#phase').html('Westeros Card 3');
            $('#now').html('updating...');
        } else if (faza == 3) {
            $('#phase').html('Planning');
            $('#now').html('All');
        } else if (faza == 18) {
            $('#phase').html('Reveal Wildling Card');
            $('#now').html('updating...');
        } else if (faza == 19) {
            $('#phase').html('Wildling attack consequences');
            $('#now').html('updating...');
        };

        currentplayer = json.currentplayer;
        WAconseq = json;
        wildcard = json.WildCard1;
        var total = json.asup1*1+json.asup2*1+json.asup3*1+json.asup4*1+json.asup5*1+json.asup6*1;
        //popup with info about attack and bids
        $("#popupContent").html('<table style="margin-top:10px;" width="400" border="1" align="center"><tr><th colspan="2" scope="col"><p>Wildling Attack!</p></th></tr><tr><td width="250" align="center" valign="middle">Wildlings` Power</td><td align="center" valign="middle">'+(wildpower*2)+'</td></tr><tr><td width="250" align="center" valign="middle">Wildlings` Card</td><td id="WCreveal" align="center" valign="middle"></td></tr><tr><td colspan="2" scope="col" align="center" valign="middle">House`s bids</td></tr><tr><td align="center" valign="middle">'+json.dsup1+'</td><td align="center" valign="middle">'+json.asup1+'</td></tr><tr><td align="center" valign="middle">'+json.dsup2+'</td><td align="center" valign="middle">'+json.asup2+'</td></tr><tr><td align="center" valign="middle">'+json.dsup3+'</td><td align="center" valign="middle">'+json.asup3+'</td></tr><tr><td align="center" valign="middle">'+json.dsup4+'</td><td align="center" valign="middle">'+json.asup4+'</td></tr><tr><td align="center" valign="middle">'+json.dsup5+'</td><td align="center" valign="middle">'+json.asup5+'</td></tr><tr><td align="center" valign="middle">'+json.dsup6+'</td><td align="center" valign="middle">'+json.asup6+'</td></tr><tr><td align="center" valign="middle">Total</td><td align="center" valign="middle">'+total+'</td></tr><tr><td align="center" valign="middle">Winner</td><td align="center" valign="middle" style="padding-top: 15px;"><h3>'+json.winner+'</h3></td></tr></table>');

        if (wildcard == 0) {
            $("#WCreveal").html('Crowkillers');
        } else if (wildcard == 1) {
            $("#WCreveal").html('Silence at the Wall');
        } else if (wildcard == 2) {
            $("#WCreveal").html('Mammoth Riders');
        } else if (wildcard == 3) {
            $("#WCreveal").html('The Horde Descends');
        } else if (wildcard == 4) {
            $("#WCreveal").html('A King Beyond the Wall');
        } else if (wildcard == 5) {
            $("#WCreveal").html('Rattleshirts Raiders');
        } else if (wildcard == 6) {
            $("#WCreveal").html('Preemptive Raid');
        } else if (wildcard == 7) {
            $("#WCreveal").html('Skinchanger Scout');
        } else if (wildcard == 8) {
            $("#WCreveal").html('Massing on the Milkwater');
        };

        $("#popupError").html('');

        //if you are highest bidder and Watch is winner
        if (json.winner == 'Watch' && faza == 17) {
            $('#now').html(json.dsup1);
            if (wildcard == 0 && myhouse == json.dsup1) {//Crowkillers
                if (eval('houses.'+myhouse+'.ready') == 2) { //if player already upgrades 2 FM with Crowkillers
                    disablePopup();
                    $.get('php/crowkillers_end.php',{house: house, myhouse: myhouse, id: game_id});
                } else {
                    clearInterval(myInterval);
                    $("#popup2Content").html('<h3>Upgrade 2 Footmen into Knights.</h3>');
                    $("#popup2Error").html('');

                    topPopup2();
                    load2Popup2();

                    loadReady();
                };
            } else if (wildcard == 2 && myhouse == json.dsup1) {//Mammoth Riders
                clearInterval(myInterval);

                $("#popup2Content").html('<h2>Choose card to retrieve!</h2><h3>Your discard pile:</h3><div class="clearfix" id="mycards"></div>');
                $("#popup2Error").html('');

                drawpile(myhouse, '#mycards');

                $('#mycards div.hcard').click(function() {
                    var hero = this.id;
                    $.get('php/mamoth_riders.php', {id: game_id, hero: hero, house: house});
                    disablePopup2();
                    myInterval = setInterval("refresh();", 3000);
                    disablePopup();
                });

                if ($('#mycards').html() == '') {
                    $.get('php/mamoth_riders.php', {id: game_id, hero: 0, house: house});
                    myInterval = setInterval("refresh();", 3000);
                    disablePopup();
                } else {
                    //centering with css
                    centerPopup2();
                    //load popup
                    loadPopup2();
                };

            } else if (wildcard == 3 && myhouse == json.dsup1) {//The Horde Descends
                if (eval('houses.'+myhouse+'.ready') > 0) { //if player already Mustered
                    $.get('php/crowkillers_end.php',{house: house, myhouse: myhouse, id: game_id});
                    disablePopup();
                    disablePopup2();
                    disableReady();
                } else {
                    clearInterval(myInterval);
                    $("#popup2Content").html('<h3>You can muster in any Castle/Stronghold.</h3>');
                    $("#popup2Error").html('');

                    topPopup2();
                    load2Popup2();

                    loadReady();
                };
            } else if (wildcard == 4 && myhouse == json.dsup1) {//A King Beyond the Wall
                clearInterval(myInterval);

                $("#popup2Content").html('<h2>Please choose where to move to the top of the track</h2><div id="copytrack"></div><a class="button votethrone" href="#">Throne</a><a class="button votefiefdom" href="#">Fiefdom</a><a class="button votecourt" href="#">Court</a>');

                $("#popup2Error").html('');
                $("#copytrack").html(track.innerHTML);
                //centering with css
                topPopup2();
                //load popup
                loadPopup2();

                //click on Throne
                $("#popup2Content a.votethrone").click(function(){
                    $.get('php/king_throne.php',{id: game_id, house: house}, function(){
                        myInterval = setInterval("refresh();", 3000);
                    });
                    disablePopup2();
                    disablePopup();
                    return false;
                });

                //click on Fiefdom
                $("#popup2Content a.votefiefdom").click(function(){
                    $.get('php/king_fiefdom.php',{id: game_id, house: house}, function(){
                        myInterval = setInterval("refresh();", 3000);
                    });
                    disablePopup2();
                    disablePopup();
                    return false;
                });

                //click on Court
                $("#popup2Content a.votecourt").click(function(){
                    $.get('php/king_court.php',{id: game_id, house: house}, function(){
                        myInterval = setInterval("refresh();", 3000);
                    });
                    disablePopup2();
                    disablePopup();
                    return false;
                });
            } else if (wildcard == 6 && myhouse != json.dsup1) {//Preemptive Raid
                $('#now').html('All but '+json.dsup1);

                if (json.currentplayer == 0) {
                    houses.Greyjoy.ready = json.Greyjoy;
                    houses.Stark.ready = json.Stark;
                    houses.Lannister.ready = json.Lannister;
                    houses.Martell.ready = json.Martell;
                    houses.Tyrell.ready = json.Tyrell;
                    houses.Baratheon.ready = json.Baratheon;
                }

                if (eval('houses.'+myhouse+'.ready') == 0) {
                    clearInterval(myInterval);
                    $("#popup2Content").html('<table style="margin-top:10px;" width="400" border="1" align="center"><tr><th colspan="2" scope="col"><p>Wildling Attack!</p></th></tr><tr><td width="250" align="center" valign="middle">Wildlings` Power</td><td align="center" valign="middle">6</td></tr><tr><td colspan="2" scope="col" align="center" valign="middle">House`s Power tokens</td></tr><tr><td align="center" valign="middle">Stark</td><td align="center" valign="middle">'+houses.Stark.tokih+'</td></tr><tr><td align="center" valign="middle">Greyjoy</td><td align="center" valign="middle">'+houses.Greyjoy.tokih+'</td></tr><tr><td align="center" valign="middle">Lannister</td><td align="center" valign="middle">'+houses.Lannister.tokih+'</td></tr><tr><td align="center" valign="middle">Baratheon</td><td align="center" valign="middle">'+houses.Baratheon.tokih+'</td></tr><tr><td align="center" valign="middle">Tyrell</td><td align="center" valign="middle">'+houses.Tyrell.tokih+'</td></tr><tr><td align="center" valign="middle">Martell</td><td align="center" valign="middle">'+houses.Martell.tokih+'</td></tr></table><form class="form" ><p class="col_50"><label for="bid">Your bid:</label><br/><input type="text" name="bid" id="bid" value="" tabindex="1" maxlength="2" onkeypress="if ((event.keyCode < 48) || (event.keyCode > 57)) event.returnValue=false;"/></p><div><input id ="sendbid" type="submit" value="Bid" class="button" /></div></form>');
                    $("#popup2Error").html('');

                    $("#sendbid").click(function() {
                        var mybid = parseInt($('#bid').val().replace(/^[0]([0-9])/, '$1'));

                        if (mybid >= 0 && mybid <= eval('houses.'+myhouse+'.tokih')) {
                            $.get('php/bid_wild2.php', {id: game_id, house: house, myhouse: myhouse, bid: mybid});
                            disablePopup2();
                            myInterval = setInterval("refresh();", 3000);
                            eval('houses.'+myhouse+'.ready = 1');
                        } else {
                            $("#popup2Error").html('Your bid should not exceed your number of Power tokens');
                            $('#bid').focus();
                        }
                        return false;
                    });

                    centerPopup2();
                    loadPopup2();
                } else if (faza == 17) {//player already bidded
                    $("#popup2Content").html('<table style="margin-top:10px;" width="400" border="1" align="center"><tr><th colspan="2" scope="col"><p>Wildling Attack!</p></th></tr><tr><td width="250" align="center" valign="middle">Wildlings` Power</td><td align="center" valign="middle">6</td></tr></table>');
                    $("#popup2Error").html('');
                    topPopup2();
                    load2Popup2();
                }
            }

        } else if (json.winner == 'Wildlings' && faza == 17) {//if Wildlings win
            if (currentplayer == 0) {
                $('#now').html(json.dsup6);
            } else {
                $('#now').html(currentplayer);
            };
            if (wildcard == 0) {//Crowkillers
                mapsetup();
                if (myhouse == json.dsup6 && currentplayer == 0) {//for lowest bidder
                    if (eval('houses.'+myhouse+'.ready') == 0) {
                        clearInterval(myInterval);

                        //check FM+KN <=10
                        var FMKN = supplyFMKN(mycontrol);
                        if (FMKN <= 10) {//auto-degrade without removing units
                            for (name in units) {
                                var tempval = eval(units[name]);
                                //search for KNs and degrade
                                if (tempval.control == mycontrol && tempval.unit1 != 0) {
                                    if (tempval.unit1 == 'K1' || tempval.unit1 == 'K0') {
                                        $.get('php/degrade_knight.php',{table: terr, target:name, targetunit:'unit1'});
                                    }
                                    if (tempval.unit2 != 0) {
                                        if (tempval.unit2 == 'K1' || tempval.unit2 == 'K0') {
                                            $.get('php/degrade_knight.php',{table: terr, target:name, targetunit:'unit2'});
                                        }
                                        if (tempval.unit3 != 0) {
                                            if (tempval.unit3 == 'K1' || tempval.unit3 == 'K0') {
                                                $.get('php/degrade_knight.php',{table: terr, target:name, targetunit:'unit3'});
                                            }
                                            if (tempval.unit4 != 0) {
                                                if (tempval.unit4 == 'K1' || tempval.unit4 == 'K0') {
                                                    $.get('php/degrade_knight.php',{table: terr, target:name, targetunit:'unit4'});
                                                }

                                            }
                                        }
                                    }
                                }
                            };
                            $.get('php/crowkillers_end2.php',{id: game_id});
                            currentplayer = 1;
                            myInterval = setInterval("refresh();", 3000);
                        } else {
                            $("#popup2Content").html('<h3>You have not enough supply for Footmen. Click to remove Knight.</h3>');
                            $("#popup2Error").html('');

                            topPopup2();
                            load2Popup2();
                            eval('houses.'+myhouse+'.ready = 1');
                        };
                    };
                } else if (myhouse == currentplayer) {//Crowkillers for other bidders
                    clearInterval(myInterval);
                    if (supplyKN(mycontrol) == 0) {
                        $.get('php/crowkillers_end3.php',{house: house, id: game_id});
                        myInterval = setInterval("refresh();", 3000);
                    } else {
                        $("#popup2Content").html('<h3>Click to replace Knight with Footman. If unable to replace, the unit will be destroyed</h3>');
                        $("#popup2Error").html('');

                        topPopup2();
                        load2Popup2();
                    }

                };
            } else if (wildcard == 2) {//Mammoth Riders
                mapsetup();
                if (myhouse == json.dsup6 && currentplayer == 0) {//for lowest bidder
                    clearInterval(myInterval);
                    if (eval('houses.'+myhouse+'.ready') == 0) {
                        //check if units <= 3
                        var FMKN = supplyunits(mycontrol);
                        if (FMKN <= 3) {//auto-removing units
                            for (name in units) {
                                var tempval = eval(units[name]);
                                //search for units and remove
                                if (tempval.control == mycontrol && tempval.unit1 != 0) {
                                    $.get('php/remove_units.php',{terr: terr, target:name, house:house});
                                }
                            };
                            $.get('php/crowkillers_end2.php',{id: game_id});
                            currentplayer = 1;
                            myInterval = setInterval("refresh();", 3000);
                        } else {
                            $("#popup2Content").html('<h3>You must destroy 3 units anywhere on the map. Click to remove unit.</h3>');
                            $("#popup2Error").html('');

                            topPopup2();
                            load2Popup2();
                        };
                    } else {
                        $("#popup2Content").html('<h3>You must destroy 3 units anywhere on the map. Click to remove unit.</h3>');
                        $("#popup2Error").html('');

                        topPopup2();
                        load2Popup2();
                    };
                } else if (myhouse == currentplayer) {//Mammoth Riders for other bidders
                    clearInterval(myInterval);
                    if (eval('houses.'+myhouse+'.ready') == 0) {
                        //check if units <= 3
                        var FMKN = supplyunits(mycontrol);
                        if (FMKN <= 2) {//auto-removing units
                            for (name in units) {
                                var tempval = eval(units[name]);
                                //search for units and remove
                                if (tempval.control == mycontrol && tempval.unit1 != 0) {
                                    $.get('php/remove_units.php',{terr: terr, target:name, house:house});
                                }
                            };
                            $.get('php/crowkillers_end3.php',{id: game_id, house: house});
                            myInterval = setInterval("refresh();", 3000);
                        } else {
                            $("#popup2Content").html('<h3>You must destroy 2 units anywhere on the map. Click to remove unit.</h3>');
                            $("#popup2Error").html('');

                            topPopup2();
                            load2Popup2();
                        };
                    } else {
                        $("#popup2Content").html('<h3>You must destroy 2 units anywhere on the map. Click to remove unit.</h3>');
                        $("#popup2Error").html('');

                        topPopup2();
                        load2Popup2();
                    };
                };
            } else if (wildcard == 3) {//The Horde Descends
                mapsetup();
                if (myhouse == json.dsup6 && currentplayer == 0) {//for lowest bidder
                    clearInterval(myInterval);
                    if (eval('houses.'+myhouse+'.ready') == 0) {
                        //check if units <= 2
                        var FMKN = supplyunits(mycontrol);
                        if (FMKN <= 2) {//auto-removing units
                            for (name in units) {
                                var tempval = eval(units[name]);
                                //search for units and remove
                                if (tempval.control == mycontrol && tempval.unit1 != 0) {
                                    $.get('php/remove_units.php',{terr: terr, target:name, house:house});
                                }
                            };
                            $.get('php/crowkillers_end2.php',{id: game_id});
                            currentplayer = 1;
                            myInterval = setInterval("refresh();", 3000);
                        } else {
                            //check if castles with 2 or more units exist
                            var i = 0;
                            for (name in units) {
                                var tempval = eval(units[name]);
                                if (tempval.control == mycontrol && tempval.unit2 != 0 && tempval.castle != 0) {
                                    hordezamki[i] = name;
                                    i++;
                                };
                            };
                            if (hordezamki[0] != undefined) {
                                $("#popup2Content").html('<h3>You must destroy 2 units at one of your Cities/Strongholds.</h3>');
                            } else {
                                $("#popup2Content").html('<h3>You must destroy 2 units anywhere on the map. Click to remove unit.</h3>');
                            }
                            $("#popup2Error").html('');

                            topPopup2();
                            load2Popup2();
                        };
                    } else {
                        $("#popup2Content").html('<h3>You must destroy 2 units anywhere on the map. Click to remove unit.</h3>');
                        $("#popup2Error").html('');

                        topPopup2();
                        load2Popup2();
                    };
                } else if (myhouse == currentplayer) {//The Horde Descends for other bidders
                    clearInterval(myInterval);
                    //check if units <= 1
                    var FMKN = supplyunits(mycontrol);
                    if (FMKN <= 1) {//auto-removing units
                        for (name in units) {
                            var tempval = eval(units[name]);
                            //search for units and remove
                            if (tempval.control == mycontrol && tempval.unit1 != 0) {
                                $.get('php/remove_units.php',{terr: terr, target:name, house:house});
                            }
                        };
                        $.get('php/crowkillers_end3.php',{id: game_id, house: house});
                        myInterval = setInterval("refresh();", 3000);
                    } else {
                        $("#popup2Content").html('<h3>You must destroy 1 unit anywhere on the map. Click to remove unit.</h3>');
                        $("#popup2Error").html('');

                        topPopup2();
                        load2Popup2();
                    };
                };
            } else if (wildcard == 4) {//A King Beyond the Wall
                //influence track setup
                for (i=0; i<6; i++){
                    throne[i] = eval('json.throne'+(i+1));
                    fiefdom[i] = eval('json.fiefdom'+(i+1));
                    court[i] = eval('json.court'+(i+1));
                    $('#'+throne[i]+'-throne').hide();
                    $('#'+fiefdom[i]+'-blade').hide();
                    $('#'+court[i]+'-raven').hide();
                }

                i=0;
                $('#track table tr:eq(0) td').each(function() {
                    $(this).html('<div class="' + throne[i] + '-track token"></div>');
                    i++;
                });
                i=0;
                $('#track table tr:eq(1) td').each(function() {
                    $(this).html('<div class="' + fiefdom[i] + '-track token"></div>');
                    i++;
                });
                i=0;
                $('#track table tr:eq(2) td').each(function() {
                    $(this).html('<div class="' + court[i] + '-track token"></div>');
                    i++;
                });

                //uniq tokens setup
                $('#'+throne[0]+'-throne').show();
                $('#'+fiefdom[0]+'-blade').show();
                $('#'+court[0]+'-raven').show();

                if (myhouse == currentplayer) {//A King Beyond the Wall for other bidders
                    clearInterval(myInterval);

                    $("#popup2Content").html('<h2>Please choose where to move to the bottom of the track</h2><div id="copytrack"></div><div class="centered"><a class="button votefiefdom" href="#">Fiefdom</a><a class="button votecourt" href="#">Court</a></div>');

                    $("#popup2Error").html('');
                    $("#copytrack").html(track.innerHTML);
                    //centering with css
                    topPopup2();
                    //load popup
                    loadPopup2();

                    //click on Fiefdom
                    $("#popup2Content a.votefiefdom").click(function(){
                        $.get('php/king_fiefdom2.php',{id: game_id, house: house, myhouse: myhouse}, function(){
                            myInterval = setInterval("refresh();", 3000);
                        });
                        disablePopup2();
                        disablePopup();
                        return false;
                    });

                    //click on Court
                    $("#popup2Content a.votecourt").click(function(){
                        $.get('php/king_court2.php',{id: game_id, house: house, myhouse: myhouse}, function(){
                            myInterval = setInterval("refresh();", 3000);
                        });
                        disablePopup2();
                        disablePopup();
                        return false;
                    });
                };
            } else if (wildcard == 8) {//Massing on the Milkwater
                housesinfo();

                if (myhouse == currentplayer) {//Massing on the Milkwater for other bidders
                    clearInterval(myInterval);

                    if ((parseInt(eval('houses.'+myhouse+'.HC1')) + parseInt(eval('houses.'+myhouse+'.HC2')) + parseInt(eval('houses.'+myhouse+'.HC3')) + parseInt(eval('houses.'+myhouse+'.HC4')) + parseInt(eval('houses.'+myhouse+'.HC5')) + parseInt(eval('houses.'+myhouse+'.HC6')) + parseInt(eval('houses.'+myhouse+'.HC7'))) > 1) {
                        $("#popup2Content").html('<h2>Choose card to discard!</h2><h3>Your cards:</h3><div class="clearfix" id="mycards"></div>');
                        $("#popup2Error").html('');

                        drawcards(myhouse, '#mycards');

                        $('#mycards div.hcard').click(function() {
                            var hero = this.id;
                            $.get('php/milkwater.php', {id: game_id, hero: hero, house: house});
                            disablePopup2();
                            myInterval = setInterval("refresh();", 3000);
                            disablePopup();
                        });

                        //centering with css
                        centerPopup2();
                        //load popup
                        loadPopup2();
                    } else {
                        $.get('php/crowkillers_end3.php',{house: house, id: game_id});
                        myInterval = setInterval("refresh();", 3000);
                    }

                };
            } else if (wildcard == 6) {//Preemptive Raid
                if (myhouse == json.dsup6 && currentplayer == 0) {//for lowest bidder
                    clearInterval(myInterval);
                    if (eval('houses.'+myhouse+'.ready') == 0) {
                        $("#popup2Content").html('<h2>Choose either:</h2><a id="Destroy" class="button" href="#">Destroy two units</a><a id="Reduce" class="button" href="#">Reduce 2 positions on highest track</a>');

                        $("#popup2Error").html('');
                        //centering with css
                        centerPopup2();
                        //load popup
                        loadPopup2();

                        //click on Destroy
                        $("#Destroy").click(function(){
                            //check if units <= 2
                            var FMKN = supplyunits(mycontrol);
                            if (FMKN <= 2) {//auto-removing units
                                for (name in units) {
                                    var tempval = eval(units[name]);
                                    //search for units and remove
                                    if (tempval.control == mycontrol && tempval.unit1 != 0) {
                                        $.get('php/remove_units.php',{terr: terr, target:name, house:house});
                                    }
                                };
                                $.get('php/preemptive_end.php',{id: game_id, house: house, myhouse: myhouse});
                                disablePopup2();
                                myInterval = setInterval("refresh();", 3000);
                            } else {
                                eval('houses.'+myhouse+'.ready = 1');
                                $.get('php/player_ready.php',{table: house, myhouse: myhouse, id: game_id});
                                $("#popup2Content").html('<h3>You must destroy 2 units anywhere on the map. Click to remove unit.</h3>');
                                $("#popup2Error").html('');
                                disablePopup();
                                topPopup2();
                            };
                            return false;
                        });

                        //click on Reduce
                        $("#Reduce").click(function(){
                            var track;
                            //find highest track
                            for (i=0; i<6; i++) {
                                if (throne[i] == myhouse) {
                                    track = 'throne';
                                    break;
                                } else if (fiefdom[i] == myhouse) {
                                    track = 'fiefdom';
                                    break;
                                } else if (court[i] == myhouse) {
                                    track = 'court';
                                    break;
                                }
                            };
                            $.get('php/preemptive_track.php',{id: game_id, house: house, myhouse: myhouse, track: track}, function(){
                                myInterval = setInterval("refresh();", 3000);
                            });
                            disable2Popup2();
                            return false;
                        });
                    } else {
                        $("#popup2Content").html('<h3>You must destroy 2 units anywhere on the map. Click to remove unit.</h3>');
                        $("#popup2Error").html('');

                        topPopup2();
                        load2Popup2();
                    };
                };
            }

        }
        if (faza == 17) {
            //centering with css
            top2Popup();
            //load popup
            load2Popup();
        } else {
            disablePopup();
            initialize();
        };
    });
};

//Check amount of FM+KN for Crowkillers function
function supplyFMKN(mycontrol) {
    var FM = 0;
    var KN = 0;

    for (name in units) {
        var tempval = eval(units[name]);
        //count up units by type
        if (tempval.control == mycontrol && tempval.unit1 != 0) {
            if (tempval.unit1 == 'F1' || tempval.unit1 == 'F0') {
                FM++;
            } else if (tempval.unit1 == 'K1' || tempval.unit1 == 'K0') {
                KN++;
            }
            if (tempval.unit2 != 0) {
                if (tempval.unit2 == 'F1' || tempval.unit2 == 'F0') {
                    FM++;
                } else if (tempval.unit2 == 'K1' || tempval.unit2 == 'K0') {
                    KN++;
                }
                if (tempval.unit3 != 0) {
                    if (tempval.unit3 == 'F1' || tempval.unit3 == 'F0') {
                        FM++;
                    } else if (tempval.unit3 == 'K1' || tempval.unit3 == 'K0') {
                        KN++;
                    }
                    if (tempval.unit4 != 0) {
                        if (tempval.unit4 == 'F1' || tempval.unit4 == 'F0') {
                            FM++;
                        } else if (tempval.unit4 == 'K1' || tempval.unit4 == 'K0') {
                            KN++;
                        }

                    }
                }
            }
        }
    }

    //units type check
    return (KN + FM);
};

//Check amount of FM for Crowkillers function
function supplyFM(mycontrol) {
    var FM = 0;

    for (name in units) {
        var tempval = eval(units[name]);
        //count up units by type
        if (tempval.control == mycontrol && tempval.unit1 != 0) {
            if (tempval.unit1 == 'F1' || tempval.unit1 == 'F0') {
                FM++;
            }
            if (tempval.unit2 != 0) {
                if (tempval.unit2 == 'F1' || tempval.unit2 == 'F0') {
                    FM++;
                }
                if (tempval.unit3 != 0) {
                    if (tempval.unit3 == 'F1' || tempval.unit3 == 'F0') {
                        FM++;
                    }
                    if (tempval.unit4 != 0) {
                        if (tempval.unit4 == 'F1' || tempval.unit4 == 'F0') {
                            FM++;
                        }

                    }
                }
            }
        }
    }

    //units type check
    return (FM);
};

//Check amount of KN for Crowkillers function
function supplyKN(mycontrol) {
    var KN = 0;

    for (name in units) {
        var tempval = eval(units[name]);
        //count up units by type
        if (tempval.control == mycontrol && tempval.unit1 != 0) {
            if (tempval.unit1 == 'K1' || tempval.unit1 == 'K0') {
                KN++;
            }
            if (tempval.unit2 != 0) {
                if (tempval.unit2 == 'K1' || tempval.unit2 == 'K0') {
                    KN++;
                }
                if (tempval.unit3 != 0) {
                    if (tempval.unit3 == 'K1' || tempval.unit3 == 'K0') {
                        KN++;
                    }
                    if (tempval.unit4 != 0) {
                        if (tempval.unit4 == 'K1' || tempval.unit4 == 'K0') {
                            KN++;
                        }

                    }
                }
            }
        }
    }

    //units type check
    return (KN);
};

//Check amount of any units for Mammoth Riders function
function supplyunits(mycontrol) {
    var FM = 0;

    for (name in units) {
        var tempval = eval(units[name]);
        //count up units by type
        if (tempval.control == mycontrol && tempval.unit1 != 0) {
                FM++;
            if (tempval.unit2 != 0) {
                    FM++;
                if (tempval.unit3 != 0) {
                        FM++;
                    if (tempval.unit4 != 0) {
                            FM++;
                    }
                }
            }
        }
    }

    //units type check
    return (FM);
};

//sorting object function
function asort(arr) {
    sort_func = function(a, b) { return b - a};

    var b = [];
    for (var i in arr) {
        b.push([i, arr[i]]);
    };
    b.sort(function(a, b) { return sort_func(a[1], b[1])});

    var c = {};
    for (var i in b) {
        c[b[i][0]] = b[i][1];
    };
    return c;
};

//Reveal Wildling Card phase refresh
function revealwcrefresh2() {
    $.getJSON('php/game_refresh18.php', {id: game_id, house: house}, function(json){
        faza = parseInt(json.faza);
        $('#now').html(throne[0]);
        if (faza == 0) {
            $('#phase').html('Westeros Card 1');
            $('#now').html('updating...');
        } else if (faza == 1) {
            $('#phase').html('Westeros Card 2');
            $('#now').html('updating...');
        } else if (faza == 2) {
            $('#phase').html('Westeros Card 3');
            $('#now').html('updating...');
        } else if (faza == 3) {
            $('#phase').html('Planning');
            $('#now').html('All');
        } else if (faza == 19) {
            $('#phase').html('Wildling attack consequences');
            $('#now').html('updating...');
        };

        wildcard = json.WildCard1;
        var total = json.Stark*1+json.Greyjoy*1+json.Lannister*1+json.Baratheon*1+json.Tyrell*1+json.Martell*1;
        //popup with info about attack and bids
        $("#popup2Content").html('<table style="margin-top:10px;" width="400" border="1" align="center"><tr><th colspan="2" scope="col"><p>Wildling Attack!</p></th></tr><tr><td width="250" align="center" valign="middle">Wildlings` Power</td><td align="center" valign="middle">'+(wildpower*2)+'</td></tr><tr><td width="250" align="center" valign="middle">Wildlings` Card</td><td id="WCreveal" align="center" valign="middle"></td></tr><tr><td colspan="2" scope="col" align="center" valign="middle">House`s bids</td></tr><tr><td align="center" valign="middle">Stark</td><td align="center" valign="middle">'+json.Stark+'</td></tr><tr><td align="center" valign="middle">Greyjoy</td><td align="center" valign="middle">'+json.Greyjoy+'</td></tr><tr><td align="center" valign="middle">Lannister</td><td align="center" valign="middle">'+json.Lannister+'</td></tr><tr><td align="center" valign="middle">Baratheon</td><td align="center" valign="middle">'+json.Baratheon+'</td></tr><tr><td align="center" valign="middle">Tyrell</td><td align="center" valign="middle">'+json.Tyrell+'</td></tr><tr><td align="center" valign="middle">Martell</td><td align="center" valign="middle">'+json.Martell+'</td></tr><tr><td align="center" valign="middle">Total</td><td align="center" valign="middle">'+total+'</td></tr></table>');

        if (wildcard == 0) {
            $("#WCreveal").html('Crowkillers');
        } else if (wildcard == 1) {
            $("#WCreveal").html('Silence at the Wall');
        } else if (wildcard == 2) {
            $("#WCreveal").html('Mammoth Riders');
        } else if (wildcard == 3) {
            $("#WCreveal").html('The Horde Descends');
        } else if (wildcard == 4) {
            $("#WCreveal").html('A King Beyond the Wall');
        } else if (wildcard == 5) {
            $("#WCreveal").html('Rattleshirts Raiders');
        } else if (wildcard == 6) {
            $("#WCreveal").html('Preemptive Raid');
        } else if (wildcard == 7) {
            $("#WCreveal").html('Skinchanger Scout');
        } else if (wildcard == 8) {
            $("#WCreveal").html('Massing on the Milkwater');
        };

        $("#popup2Error").html('');

        //if you are Irone Throne holder
        if (myhouse == throne[0] && myhouse != undefined && faza == 18) {
            clearInterval(myInterval);
            $("#popup2Content").append('<h3>Choose order of the houses</h3><form><ol id="bids"></ol></form><div><input id ="tiesubmit" type="submit" value="Done" class="button" /></div>');

            //click on Done
            $("#tiesubmit").click(function(){
                var bid1 = document.getElementById('select-1').value;
                var bid2 = document.getElementById('select-2').value;
                var bid3 = document.getElementById('select-3').value;
                var bid4 = document.getElementById('select-4').value;
                var bid5 = document.getElementById('select-5').value;
                if (bid1 != bid2 && bid1 != bid3 && bid1 != bid4 && bid1 != bid5 && bid2 != bid3 && bid2 != bid4 && bid2 != bid5 && bid3 != bid4 && bid3 != bid5 && bid4 != bid5) {
                    $.get('php/tie_wild2.php', {id: game_id, bid1: bid1, bid2: bid2, bid3: bid3, bid4: bid4, bid5: bid5, house: house});
                    disablePopup2();
                    myInterval = setInterval("refresh();", 3000);
                } else {
                    $("#popup2Error").html('Place all Houses in the desired order');
                }
                return false;
            });
            //sorting bids
            var bids = new Object();
            if (json.defender != 'Stark') {
                bids.Stark = json.Stark;
            };
            if (json.defender != 'Baratheon') {
                bids.Baratheon = json.Baratheon;
            };
            if (json.defender != 'Tyrell') {
                bids.Tyrell = json.Tyrell;
            };
            if (json.defender != 'Greyjoy') {
                bids.Greyjoy = json.Greyjoy;
            };
            if (json.defender != 'Martell') {
                bids.Martell = json.Martell;
            };
            if (json.defender != 'Lannister') {
                bids.Lannister = json.Lannister;
            };
            bids = asort(bids);
            var doma = new Array();
            var j = 1;
            for(i in bids) {
                doma[j] = i;
                j++;
            };
            //display uniq bids and even bids
            for (i = 1; i < 6; i++) {
                if (bids[doma[i]] != bids[doma[i+1]]) {//single
                    $("#bids").append('<li><select disabled="true" name="bid'+ i +'" id="select-'+ i +'"><option value="'+ doma[i] +'">'+ doma[i] +'</option></select></li>');
                } else if (bids[doma[i]] == bids[doma[i+1]]) {//2 even
                    $("#bids").append('<li><select name="bid'+ i +'" id="select-'+ i +'" class="select-'+ i +'"><option selected="selected" value="'+ doma[i] +'">'+ doma[i] +'</option><option value="'+ doma[i+1] +'">'+ doma[i+1] +'</option></select></li><li><select name="bid'+ (i+1) +'" id="select-'+ (i+1) +'" class="select-'+ i +'"><option value="'+ doma[i] +'">'+ doma[i] +'</option><option selected="selected" value="'+ doma[i+1] +'">'+ doma[i+1] +'</option></select></li>');
                    if (bids[doma[i]] == bids[doma[i+2]]) {//3 even
                        $("#select-"+ i).append('<option value="'+ doma[i+2] +'">'+ doma[i+2] +'</option>');
                        $("#select-"+ (i+1)).append('<option value="'+ doma[i+2] +'">'+ doma[i+2] +'</option>');
                        $("#bids").append('<li><select name="bid'+ (i+2) +'" id="select-'+ (i+2) +'" class="select-'+ i +'"><option value="'+ doma[i] +'">'+ doma[i] +'</option><option value="'+ doma[i+1] +'">'+ doma[i+1] +'</option><option selected="selected" value="'+ doma[i+2] +'">'+ doma[i+2] +'</option></select></li>');
                        if (bids[doma[i]] == bids[doma[i+3]]) {//4 even
                            $("#select-"+ i).append('<option value="'+ doma[i+3] +'">'+ doma[i+3] +'</option>');
                            $("#select-"+ (i+1)).append('<option value="'+ doma[i+3] +'">'+ doma[i+3] +'</option>');
                            $("#select-"+ (i+2)).append('<option value="'+ doma[i+3] +'">'+ doma[i+3] +'</option>');
                            $("#bids").append('<li><select name="bid'+ (i+3) +'" id="select-'+ (i+3) +'" class="select-'+ i +'"><option value="'+ doma[i] +'">'+ doma[i] +'</option><option value="'+ doma[i+1] +'">'+ doma[i+1] +'</option><option value="'+ doma[i+2] +'">'+ doma[i+2] +'</option><option selected="selected" value="'+ doma[i+3] +'">'+ doma[i+3] +'</option></select></li>');
                            if (bids[doma[i]] == bids[doma[i+4]]) {//5 even
                                $("#select-"+ i).append('<option value="'+ doma[i+4] +'">'+ doma[i+4] +'</option>');
                                $("#select-"+ (i+1)).append('<option value="'+ doma[i+4] +'">'+ doma[i+4] +'</option>');
                                $("#select-"+ (i+2)).append('<option value="'+ doma[i+4] +'">'+ doma[i+4] +'</option>');
                                $("#select-"+ (i+3)).append('<option value="'+ doma[i+4] +'">'+ doma[i+4] +'</option>');
                                $("#bids").append('<li><select name="bid'+ (i+4) +'" id="select-'+ (i+4) +'" class="select-'+ i +'"><option value="'+ doma[i] +'">'+ doma[i] +'</option><option value="'+ doma[i+1] +'">'+ doma[i+1] +'</option><option value="'+ doma[i+2] +'">'+ doma[i+2] +'</option><option value="'+ doma[i+3] +'">'+ doma[i+3] +'</option><option selected="selected" value="'+ doma[i+4] +'">'+ doma[i+4] +'</option></select></li>');
                                if (bids[doma[i]] == bids[doma[i+5]]) {//6 even
                                    $("#select-"+ i).append('<option value="'+ doma[i+5] +'">'+ doma[i+5] +'</option>');
                                    $("#select-"+ (i+1)).append('<option value="'+ doma[i+5] +'">'+ doma[i+5] +'</option>');
                                    $("#select-"+ (i+2)).append('<option value="'+ doma[i+5] +'">'+ doma[i+5] +'</option>');
                                    $("#select-"+ (i+3)).append('<option value="'+ doma[i+5] +'">'+ doma[i+5] +'</option>');
                                    $("#select-"+ (i+4)).append('<option value="'+ doma[i+5] +'">'+ doma[i+5] +'</option>');
                                    $("#bids").append('<li><select name="bid'+ (i+5) +'" id="select-'+ (i+5) +'" class="select-'+ i +'"><option value="'+ doma[i] +'">'+ doma[i] +'</option><option value="'+ doma[i+1] +'">'+ doma[i+1] +'</option><option value="'+ doma[i+2] +'">'+ doma[i+2] +'</option><option value="'+ doma[i+3] +'">'+ doma[i+3] +'</option><option value="'+ doma[i+4] +'">'+ doma[i+4] +'</option><option selected="selected" value="'+ doma[i+5] +'">'+ doma[i+5] +'</option></select></li>');
                                    i++;
                                }
                                i++;
                            }
                            i++;
                        }
                        i++;
                    }
                    i++;
                }
            }

        }
        if (faza == 18) {
            //centering with css
            centerPopup2();
            //load popup
            loadPopup2();
        } else {
            housesinfo();
            disablePopup2();
        };
    });
};

//Wildling attack consequences phase refresh
function conseqrefresh2() {
    $.getJSON('php/game_refresh19.php', {id: game_id, house: house}, function(json){
        faza = parseInt(json.faza);

        if (faza == 0) {
            $('#phase').html('Westeros Card 1');
            $('#now').html('updating...');
        } else if (faza == 1) {
            $('#phase').html('Westeros Card 2');
            $('#now').html('updating...');
        } else if (faza == 2) {
            $('#phase').html('Westeros Card 3');
            $('#now').html('updating...');
        } else if (faza == 3) {
            $('#phase').html('Planning');
            $('#now').html('All');
        };

        currentplayer = json.currentplayer;
        WAconseq = json;
        wildcard = json.WildCard1;
        var total = json.asup1*1+json.asup2*1+json.asup3*1+json.asup4*1+json.asup5*1;
        //popup with info about attack and bids
        $("#popupContent").html('<table style="margin-top:10px;" width="400" border="1" align="center"><tr><th colspan="2" scope="col"><p>Wildling Attack!</p></th></tr><tr><td width="250" align="center" valign="middle">Wildlings` Power</td><td align="center" valign="middle">6</td></tr><tr><td width="250" align="center" valign="middle">Wildlings` Card</td><td id="WCreveal" align="center" valign="middle"></td></tr><tr><td colspan="2" scope="col" align="center" valign="middle">House`s bids</td></tr><tr><td align="center" valign="middle">'+json.dsup1+'</td><td align="center" valign="middle">'+json.asup1+'</td></tr><tr><td align="center" valign="middle">'+json.dsup2+'</td><td align="center" valign="middle">'+json.asup2+'</td></tr><tr><td align="center" valign="middle">'+json.dsup3+'</td><td align="center" valign="middle">'+json.asup3+'</td></tr><tr><td align="center" valign="middle">'+json.dsup4+'</td><td align="center" valign="middle">'+json.asup4+'</td></tr><tr><td align="center" valign="middle">'+json.dsup5+'</td><td align="center" valign="middle">'+json.asup5+'</td></tr><tr><td align="center" valign="middle">Total</td><td align="center" valign="middle">'+total+'</td></tr><tr><td align="center" valign="middle">Winner</td><td align="center" valign="middle" style="padding-top: 15px;"><h3>'+json.winner+'</h3></td></tr></table>');

        if (wildcard == 0) {
            $("#WCreveal").html('Crowkillers');
        } else if (wildcard == 1) {
            $("#WCreveal").html('Silence at the Wall');
        } else if (wildcard == 2) {
            $("#WCreveal").html('Mammoth Riders');
        } else if (wildcard == 3) {
            $("#WCreveal").html('The Horde Descends');
        } else if (wildcard == 4) {
            $("#WCreveal").html('A King Beyond the Wall');
        } else if (wildcard == 5) {
            $("#WCreveal").html('Rattleshirts Raiders');
        } else if (wildcard == 6) {
            $("#WCreveal").html('Preemptive Raid');
        } else if (wildcard == 7) {
            $("#WCreveal").html('Skinchanger Scout');
        } else if (wildcard == 8) {
            $("#WCreveal").html('Massing on the Milkwater');
        };

        $("#popupError").html('');

        //if you are highest bidder and Watch is winner
        if (json.winner == 'Watch' && faza == 19) {
            $('#now').html(json.dsup1);
            if (wildcard == 0 && myhouse == json.dsup1) {//Crowkillers
                if (eval('houses.'+myhouse+'.ready') == 2) { //if player already upgrades 2 FM with Crowkillers
                    disablePopup();
                    $.get('php/crowkillers_end.php',{house: house, myhouse: myhouse, id: game_id});
                } else {
                    clearInterval(myInterval);
                    $("#popup2Content").html('<h3>Upgrade 2 Footmen into Knights.</h3>');
                    $("#popup2Error").html('');

                    topPopup2();
                    load2Popup2();

                    loadReady();
                };
            } else if (wildcard == 2 && myhouse == json.dsup1) {//Mammoth Riders
                clearInterval(myInterval);

                $("#popup2Content").html('<h2>Choose card to retrieve!</h2><h3>Your discard pile:</h3><div class="clearfix" id="mycards"></div>');
                $("#popup2Error").html('');

                drawpile(myhouse, '#mycards');

                $('#mycards div.hcard').click(function() {
                    var hero = this.id;
                    $.get('php/mamoth_riders.php', {id: game_id, hero: hero, house: house});
                    disablePopup2();
                    myInterval = setInterval("refresh();", 3000);
                    disablePopup();
                });

                if ($('#mycards').html() == '') {
                    $.get('php/mamoth_riders.php', {id: game_id, hero: 0, house: house});
                    myInterval = setInterval("refresh();", 3000);
                    disablePopup();
                } else {
                    //centering with css
                    centerPopup2();
                    //load popup
                    loadPopup2();
                };

            } else if (wildcard == 3 && myhouse == json.dsup1) {//The Horde Descends
                if (eval('houses.'+myhouse+'.ready') > 0) { //if player already Mustered
                    $.get('php/crowkillers_end.php',{house: house, myhouse: myhouse, id: game_id});
                    disablePopup();
                    disablePopup2();
                    disableReady();
                } else {
                    clearInterval(myInterval);
                    $("#popup2Content").html('<h3>You can muster in any Castle/Stronghold.</h3>');
                    $("#popup2Error").html('');

                    topPopup2();
                    load2Popup2();

                    loadReady();
                };
            } else if (wildcard == 4 && myhouse == json.dsup1) {//A King Beyond the Wall
                clearInterval(myInterval);

                $("#popup2Content").html('<h2>Please choose where to move to the top of the track</h2><div id="copytrack"></div><a class="button votethrone" href="#">Throne</a><a class="button votefiefdom" href="#">Fiefdom</a><a class="button votecourt" href="#">Court</a>');

                $("#popup2Error").html('');
                $("#copytrack").html(track.innerHTML);
                //centering with css
                topPopup2();
                //load popup
                loadPopup2();

                //click on Throne
                $("#popup2Content a.votethrone").click(function(){
                    $.get('php/king_throne.php',{id: game_id, house: house}, function(){
                        myInterval = setInterval("refresh();", 3000);
                    });
                    disablePopup2();
                    disablePopup();
                    return false;
                });

                //click on Fiefdom
                $("#popup2Content a.votefiefdom").click(function(){
                    $.get('php/king_fiefdom.php',{id: game_id, house: house}, function(){
                        myInterval = setInterval("refresh();", 3000);
                    });
                    disablePopup2();
                    disablePopup();
                    return false;
                });

                //click on Court
                $("#popup2Content a.votecourt").click(function(){
                    $.get('php/king_court.php',{id: game_id, house: house}, function(){
                        myInterval = setInterval("refresh();", 3000);
                    });
                    disablePopup2();
                    disablePopup();
                    return false;
                });
            }

        } else if (json.winner == 'Wildlings' && faza == 19) {//if Wildlings win
            if (currentplayer == 0) {
                $('#now').html(json.dsup6);
            } else {
                $('#now').html(currentplayer);
            };
            if (wildcard == 0) {//Crowkillers
                mapsetup();
                if (myhouse == json.dsup5 && currentplayer == 0) {//for lowest bidder
                    if (eval('houses.'+myhouse+'.ready') == 0) {
                        clearInterval(myInterval);

                        //check FM+KN <=10
                        var FMKN = supplyFMKN(mycontrol);
                        if (FMKN <= 10) {//auto-degrade without removing units
                            for (name in units) {
                                var tempval = eval(units[name]);
                                //search for KNs and degrade
                                if (tempval.control == mycontrol && tempval.unit1 != 0) {
                                    if (tempval.unit1 == 'K1' || tempval.unit1 == 'K0') {
                                        $.get('php/degrade_knight.php',{table: terr, target:name, targetunit:'unit1'});
                                    }
                                    if (tempval.unit2 != 0) {
                                        if (tempval.unit2 == 'K1' || tempval.unit2 == 'K0') {
                                            $.get('php/degrade_knight.php',{table: terr, target:name, targetunit:'unit2'});
                                        }
                                        if (tempval.unit3 != 0) {
                                            if (tempval.unit3 == 'K1' || tempval.unit3 == 'K0') {
                                                $.get('php/degrade_knight.php',{table: terr, target:name, targetunit:'unit3'});
                                            }
                                            if (tempval.unit4 != 0) {
                                                if (tempval.unit4 == 'K1' || tempval.unit4 == 'K0') {
                                                    $.get('php/degrade_knight.php',{table: terr, target:name, targetunit:'unit4'});
                                                }

                                            }
                                        }
                                    }
                                }
                            };
                            $.get('php/crowkillers_end2.php',{id: game_id});
                            currentplayer = 1;
                            myInterval = setInterval("refresh();", 3000);
                        } else {
                            $("#popup2Content").html('<h3>You have not enough supply for Footmen. Click to remove Knight.</h3>');
                            $("#popup2Error").html('');

                            topPopup2();
                            load2Popup2();
                            eval('houses.'+myhouse+'.ready = 1');
                        };
                    };
                } else if (myhouse == currentplayer) {//Crowkillers for other bidders
                    clearInterval(myInterval);
                    if (supplyKN(mycontrol) == 0) {
                        $.get('php/crowkillers_end4.php',{house: house, id: game_id});
                        myInterval = setInterval("refresh();", 3000);
                    } else {
                        $("#popup2Content").html('<h3>Click to replace Knight with Footman. If unable to replace, the unit will be destroyed</h3>');
                        $("#popup2Error").html('');

                        topPopup2();
                        load2Popup2();
                    }

                };
            } else if (wildcard == 2) {//Mammoth Riders
                mapsetup();
                if (myhouse == json.dsup5 && currentplayer == 0) {//for lowest bidder
                    clearInterval(myInterval);
                    if (eval('houses.'+myhouse+'.ready') == 0) {
                        //check if units <= 3
                        var FMKN = supplyunits(mycontrol);
                        if (FMKN <= 3) {//auto-removing units
                            for (name in units) {
                                var tempval = eval(units[name]);
                                //search for units and remove
                                if (tempval.control == mycontrol && tempval.unit1 != 0) {
                                    $.get('php/remove_units.php',{terr: terr, target:name, house:house});
                                }
                            };
                            $.get('php/crowkillers_end2.php',{id: game_id});
                            currentplayer = 1;
                            myInterval = setInterval("refresh();", 3000);
                        } else {
                            $("#popup2Content").html('<h3>You must destroy 3 units anywhere on the map. Click to remove unit.</h3>');
                            $("#popup2Error").html('');

                            topPopup2();
                            load2Popup2();
                        };
                    } else {
                        $("#popup2Content").html('<h3>You must destroy 3 units anywhere on the map. Click to remove unit.</h3>');
                        $("#popup2Error").html('');

                        topPopup2();
                        load2Popup2();
                    };
                } else if (myhouse == currentplayer) {//Mammoth Riders for other bidders
                    clearInterval(myInterval);
                    if (eval('houses.'+myhouse+'.ready') == 0) {
                        //check if units <= 3
                        var FMKN = supplyunits(mycontrol);
                        if (FMKN <= 2) {//auto-removing units
                            for (name in units) {
                                var tempval = eval(units[name]);
                                //search for units and remove
                                if (tempval.control == mycontrol && tempval.unit1 != 0) {
                                    $.get('php/remove_units.php',{terr: terr, target:name, house:house});
                                }
                            };
                            $.get('php/crowkillers_end4.php',{id: game_id, house: house});
                            myInterval = setInterval("refresh();", 3000);
                        } else {
                            $("#popup2Content").html('<h3>You must destroy 2 units anywhere on the map. Click to remove unit.</h3>');
                            $("#popup2Error").html('');

                            topPopup2();
                            load2Popup2();
                        };
                    } else {
                        $("#popup2Content").html('<h3>You must destroy 2 units anywhere on the map. Click to remove unit.</h3>');
                        $("#popup2Error").html('');

                        topPopup2();
                        load2Popup2();
                    };
                };
            } else if (wildcard == 3) {//The Horde Descends
                mapsetup();
                if (myhouse == json.dsup5 && currentplayer == 0) {//for lowest bidder
                    clearInterval(myInterval);
                    if (eval('houses.'+myhouse+'.ready') == 0) {
                        //check if units <= 2
                        var FMKN = supplyunits(mycontrol);
                        if (FMKN <= 2) {//auto-removing units
                            for (name in units) {
                                var tempval = eval(units[name]);
                                //search for units and remove
                                if (tempval.control == mycontrol && tempval.unit1 != 0) {
                                    $.get('php/remove_units.php',{terr: terr, target:name, house:house});
                                }
                            };
                            $.get('php/crowkillers_end2.php',{id: game_id});
                            currentplayer = 1;
                            myInterval = setInterval("refresh();", 3000);
                        } else {
                            //check if castles with 2 or more units exist
                            var i = 0;
                            for (name in units) {
                                var tempval = eval(units[name]);
                                if (tempval.control == mycontrol && tempval.unit2 != 0 && tempval.castle != 0) {
                                    hordezamki[i] = name;
                                    i++;
                                };
                            };
                            if (hordezamki[0] != undefined) {
                                $("#popup2Content").html('<h3>You must destroy 2 units at one of your Cities/Strongholds.</h3>');
                            } else {
                                $("#popup2Content").html('<h3>You must destroy 2 units anywhere on the map. Click to remove unit.</h3>');
                            }
                            $("#popup2Error").html('');

                            topPopup2();
                            load2Popup2();
                        };
                    } else {
                        $("#popup2Content").html('<h3>You must destroy 2 units anywhere on the map. Click to remove unit.</h3>');
                        $("#popup2Error").html('');

                        topPopup2();
                        load2Popup2();
                    };
                } else if (myhouse == currentplayer) {//The Horde Descends for other bidders
                    clearInterval(myInterval);
                    //check if units <= 1
                    var FMKN = supplyunits(mycontrol);
                    if (FMKN <= 1) {//auto-removing units
                        for (name in units) {
                            var tempval = eval(units[name]);
                            //search for units and remove
                            if (tempval.control == mycontrol && tempval.unit1 != 0) {
                                $.get('php/remove_units.php',{terr: terr, target:name, house:house});
                            }
                        };
                        $.get('php/crowkillers_end4.php',{id: game_id, house: house});
                        myInterval = setInterval("refresh();", 3000);
                    } else {
                        $("#popup2Content").html('<h3>You must destroy 1 unit anywhere on the map. Click to remove unit.</h3>');
                        $("#popup2Error").html('');

                        topPopup2();
                        load2Popup2();
                    };
                };
            } else if (wildcard == 4) {//A King Beyond the Wall
                //influence track setup
                for (i=0; i<6; i++){
                    throne[i] = eval('json.throne'+(i+1));
                    fiefdom[i] = eval('json.fiefdom'+(i+1));
                    court[i] = eval('json.court'+(i+1));
                    $('#'+throne[i]+'-throne').hide();
                    $('#'+fiefdom[i]+'-blade').hide();
                    $('#'+court[i]+'-raven').hide();
                }

                i=0;
                $('#track table tr:eq(0) td').each(function() {
                    $(this).html('<div class="' + throne[i] + '-track token"></div>');
                    i++;
                });
                i=0;
                $('#track table tr:eq(1) td').each(function() {
                    $(this).html('<div class="' + fiefdom[i] + '-track token"></div>');
                    i++;
                });
                i=0;
                $('#track table tr:eq(2) td').each(function() {
                    $(this).html('<div class="' + court[i] + '-track token"></div>');
                    i++;
                });

                //uniq tokens setup
                $('#'+throne[0]+'-throne').show();
                $('#'+fiefdom[0]+'-blade').show();
                $('#'+court[0]+'-raven').show();

                if (myhouse == currentplayer) {//A King Beyond the Wall for other bidders
                    clearInterval(myInterval);

                    $("#popup2Content").html('<h2>Please choose where to move to the bottom of the track</h2><div id="copytrack"></div><div class="centered"><a class="button votefiefdom" href="#">Fiefdom</a><a class="button votecourt" href="#">Court</a></div>');

                    $("#popup2Error").html('');
                    $("#copytrack").html(track.innerHTML);
                    //centering with css
                    topPopup2();
                    //load popup
                    loadPopup2();

                    //click on Fiefdom
                    $("#popup2Content a.votefiefdom").click(function(){
                        $.get('php/king_fiefdom3.php',{id: game_id, house: house, myhouse: myhouse}, function(){
                            myInterval = setInterval("refresh();", 3000);
                        });
                        disablePopup2();
                        disablePopup();
                        return false;
                    });

                    //click on Court
                    $("#popup2Content a.votecourt").click(function(){
                        $.get('php/king_court3.php',{id: game_id, house: house, myhouse: myhouse}, function(){
                            myInterval = setInterval("refresh();", 3000);
                        });
                        disablePopup2();
                        disablePopup();
                        return false;
                    });
                };
            } else if (wildcard == 8) {//Massing on the Milkwater
                housesinfo();

                if (myhouse == currentplayer) {//Massing on the Milkwater for other bidders
                    clearInterval(myInterval);

                    if ((parseInt(eval('houses.'+myhouse+'.HC1')) + parseInt(eval('houses.'+myhouse+'.HC2')) + parseInt(eval('houses.'+myhouse+'.HC3')) + parseInt(eval('houses.'+myhouse+'.HC4')) + parseInt(eval('houses.'+myhouse+'.HC5')) + parseInt(eval('houses.'+myhouse+'.HC6')) + parseInt(eval('houses.'+myhouse+'.HC7'))) > 1) {
                        $("#popup2Content").html('<h2>Choose card to discard!</h2><h3>Your cards:</h3><div class="clearfix" id="mycards"></div>');
                        $("#popup2Error").html('');

                        drawcards(myhouse, '#mycards');

                        $('#mycards div.hcard').click(function() {
                            var hero = this.id;
                            $.get('php/milkwater2.php', {id: game_id, hero: hero, house: house});
                            disablePopup2();
                            myInterval = setInterval("refresh();", 3000);
                            disablePopup();
                        });

                        //centering with css
                        centerPopup2();
                        //load popup
                        loadPopup2();
                    } else {
                        $.get('php/crowkillers_end4.php',{house: house, id: game_id});
                        myInterval = setInterval("refresh();", 3000);
                    }

                };
            }

        }
        if (faza == 19) {
            //centering with css
            top2Popup();
            //load popup
            load2Popup();
        } else {
            disablePopup();
            initialize();
        };
    });
};

//popus script
var popupStatus = 0;

function loadPopup(){  
	//loads popup only if it is disabled  
	if(popupStatus==0){  
		$("#backgroundPopup").css({  
		"opacity": "0.7"  
		});  
		$("#backgroundPopup").fadeIn("fast");  
		$("#popup").fadeIn("fast");  
		popupStatus = 1;
		}  
}
function load2Popup(){
	//loads popup only if it is disabled
	if(popupStatus==0){
		$("#popup").fadeIn("fast");  
		popupStatus = 1;
	}  
}

function disablePopup(){  
	//disables popup only if it is enabled  
	if(popupStatus==1){  
		$("#backgroundPopup").fadeOut("fast");  
		$("#popup").fadeOut("fast");  
		popupStatus = 0;  
	}  
}

function centerPopup(){  
	//request data for centering  
	var windowWidth = window.innerWidth;
	var windowHeight = window.innerHeight;  
	var popupHeight = $("#popup").height();  
	var popupWidth = $("#popup").width();  
	//centering  
	$("#popup").css({
		"position": "fixed",  
		"top": windowHeight/2-popupHeight/2,  
		"left": windowWidth/2-popupWidth/2  
	});
}
function topPopup(){
	$("#popup").css({
		"position": "fixed",
		"top": 10,
		"left": 10
	});
}
function top2Popup(){
    $("#popup").css({
        "position": "absolute",
        "top": 10,
        "left": 10
    });
}

//popus script #2
var popup2Status = 0;

function loadPopup2(){  
	//loads popup only if it is disabled  
	if(popup2Status==0){  
		$("#backgroundPopup").css({  
		"opacity": "0.7"  
		});  
		$("#backgroundPopup").fadeIn("fast");  
		$("#popup2").fadeIn("fast");  
		popup2Status = 1;
	}  
}
function load2Popup2(){  
	//loads popup only if it is disabled  
	if(popup2Status==0){
		$("#popup2").fadeIn("fast");  
		popup2Status = 1;
	}  
}

function disablePopup2(){  
	//disables popup only if it is enabled  
	if(popup2Status==1){
		if (popupStatus==0){
			$("#backgroundPopup").fadeOut("fast");
		}
		$("#popup2").fadeOut("fast");  
		popup2Status = 0;  
	}  
}
function disable2Popup2(){  
	//disables popup only if it is enabled  
	if(popup2Status==1){
		$("#backgroundPopup").fadeOut("fast");
		$("#popup2").fadeOut("fast");
		popup2Status = 0;
	}  
}

function centerPopup2(){  
	//request data for centering  
	var windowWidth = window.innerWidth;
	var windowHeight = window.innerHeight;  
	var popupHeight = $("#popup2").height();  
	var popupWidth = $("#popup2").width();  
	//centering  
	$("#popup2").css({
		"position": "fixed",  
		"top": windowHeight/2-popupHeight/2,  
		"left": windowWidth/2-popupWidth/2  
	});
}
function topPopup2(){  
	$("#popup2").css({
		"position": "fixed",  
		"top": 10,  
		"left": 10  
	});
}
function top2Popup2(){  
	$("#popup2").css({
		"position": "absolute",  
		"top": 10,  
		"left": 10  
	});
}

//popus script #3
var popup3Status = 0;

function loadPopup3(){  
	//loads popup only if it is disabled  
	if(popup3Status==0){  
		$("#backgroundPopup").css({  
		"opacity": "0.7"  
		});  
		$("#backgroundPopup").fadeIn("fast");  
		$("#popup3").fadeIn("fast");  
		popup3Status = 1;
		}  
}

function disablePopup3(){  
	//disables popup only if it is enabled  
	if(popup3Status==1){  
		if (popupStatus==0 && popup2Status==0){
			$("#backgroundPopup").fadeOut("fast");
		} else if ((faza == 17 || faza == 19) && (wildcard == 2 || wildcard == 3 || wildcard == 6)){
            $("#backgroundPopup").fadeOut("fast");
        }
		$("#popup3").fadeOut("fast");
		popup3Status = 0;  
	}  
}

function centerPopup3(){  
	//request data for centering  
	var windowWidth = window.innerWidth;
	var windowHeight = window.innerHeight;  
	var popupHeight = $("#popup3").height();  
	var popupWidth = $("#popup3").width();  
	//centering  
	$("#popup3").css({
		"position": "fixed",  
		"top": windowHeight/2-popupHeight/2,  
		"left": windowWidth/2-popupWidth/2  
	});
}


//planning phase function
function planningphase(terrname) {
	if ( eval('units.'+terrname+'.unit1') !=0 && eval('units.'+terrname+'.control') == mycontrol) {
		if (eval('units.'+terrname+'.prikaz') == 0){
			$("#popupContent").html('');
			if (orders[1] == 0) {$("#popupContent").append('<div class="order1 order">1</div>')} else {$("#popupContent").append('<div class="order1 noorder"></div>')};
            if (orders[3] == 0 && eval('WC3['+turn+']') != 4) {$("#popupContent").append('<div class="order3 order">3</div>')} else {$("#popupContent").append('<div class="order3 noorder"></div>')};
            if (orders[4] == 0 && eval('WC3['+turn+']') != 3) {$("#popupContent").append('<div class="order4 order">4</div>')} else {$("#popupContent").append('<div class="order4 noorder"></div>')};
            if (orders[5] == 0 && eval('WC3['+turn+']') != 5) {$("#popupContent").append('<div class="order5 order">5</div>')} else {$("#popupContent").append('<div class="order5 noorder"></div>')};
            if (orders[6] == 0 && eval('WC3['+turn+']') != 0) {$("#popupContent").append('<div class="order6 order">6</div>')} else {$("#popupContent").append('<div class="order6 noorder"></div>')};
			/*for (i=3; i<7; i++) {
				if (orders[i] == 0) {$("#popupContent").append('<div class="order'+i+' order">'+i+'</div>')} else {$("#popupContent").append('<div class="order'+i+' noorder"></div>')};
			};*/
			$("#popupContent").append('<div class="clearfix"></div>');
			if (orders[2] == 0) {$("#popupContent").append('<div class="order2 order">2</div>')} else {$("#popupContent").append('<div class="order2 noorder"></div>')};
            if (orders[3] < 2 && eval('WC3['+turn+']') != 4) {$("#popupContent").append('<div class="order3 order">3</div>')} else {$("#popupContent").append('<div class="order3 noorder"></div>')};
            if (orders[4] < 2 && eval('WC3['+turn+']') != 3) {$("#popupContent").append('<div class="order4 order">4</div>')} else {$("#popupContent").append('<div class="order4 noorder"></div>')};
            if (orders[5] < 2 && eval('WC3['+turn+']') != 5) {$("#popupContent").append('<div class="order5 order">5</div>')} else {$("#popupContent").append('<div class="order5 noorder"></div>')};
            if (orders[6] < 2 && eval('WC3['+turn+']') != 0) {$("#popupContent").append('<div class="order6 order">6</div>')} else {$("#popupContent").append('<div class="order6 noorder"></div>')};
			/*for (i=3; i<7; i++) {
				if (orders[i] < 2) {$("#popupContent").append('<div class="order'+i+' order">'+i+'</div>')} else {$("#popupContent").append('<div class="order'+i+' noorder"></div>')};
			};*/
			$("#popupContent").append('<div class="clearfix"></div>');
            if (orders[7] == 0 && orders[12] < maxspecial && eval('WC3['+turn+']') != 2) {$("#popupContent").append('<div class="order7 order">7</div>')} else {$("#popupContent").append('<div class="order7 noorder"></div>')};
            if (orders[8] == 0 && orders[12] < maxspecial && eval('WC3['+turn+']') != 4) {$("#popupContent").append('<div class="order8 order">8</div>')} else {$("#popupContent").append('<div class="order8 noorder"></div>')};
            if (orders[9] == 0 && orders[12] < maxspecial && eval('WC3['+turn+']') != 3) {$("#popupContent").append('<div class="order9 order">9</div>')} else {$("#popupContent").append('<div class="order9 noorder"></div>')};
            if (orders[10] == 0 && orders[12] < maxspecial && eval('WC3['+turn+']') != 5) {$("#popupContent").append('<div class="order10 order">10</div>')} else {$("#popupContent").append('<div class="order10 noorder"></div>')};
            if (orders[11] == 0 && orders[12] < maxspecial && eval('WC3['+turn+']') != 0) {$("#popupContent").append('<div class="order11 order">11</div>')} else {$("#popupContent").append('<div class="order11 noorder"></div>')};
			/*for (i=7; i<12; i++) {
				if (orders[i] == 0 && orders[12] < maxspecial) {$("#popupContent").append('<div class="order'+i+' order">'+i+'</div>')} else {$("#popupContent").append('<div class="order'+i+' noorder"></div>')};
			};*/
			
			$("#popupError").html('');
			//centering with css  
			centerPopup();  
			//load popup  
			loadPopup();
			
			//assign order
			$("#popupContent div.order").click(function(){
				$('#'+ terrname).append('<div class="order'+ $(this).html() +' order">'+$(this).html()+'</div>');
				orders[$(this).html()]++;
				orders['0']--;
				if (eval($(this).html()) > 6) {orders[12]++};
				eval('units.'+terrname+'.prikaz = '+$(this).html());
				$.get('php/assign_order.php',{table: terr, mesto:terrname, prikaz:$(this).html()});
				disablePopup();
				return false;
			});
		} else {
			orders[$('#'+ terrname +' .order').html()]--;
			orders['0']++;
			if (eval($('#'+ terrname +' .order').html()) > 6) {orders[12]--};
			eval('units.'+terrname+'.prikaz = 0');
			$('#'+ terrname +' .order').remove();
			$.get('php/remove_order.php',{table: terr, mesto:terrname});
		}
	}
}

//Raven phase function
function ravenphase(terrname) {
	if ( eval('units.'+terrname+'.unit1') !=0 && eval('units.'+terrname+'.control') == mycontrol) {
		$("#popupContent").html('');
		if (orders[1] == 0) {$("#popupContent").append('<div class="order1 order">1</div>')} else {$("#popupContent").append('<div class="order1 noorder"></div>')};
		for (i=3; i<7; i++) {
			if (orders[i] == 0) {$("#popupContent").append('<div class="order'+i+' order">'+i+'</div>')} else {$("#popupContent").append('<div class="order'+i+' noorder"></div>')};
		};
		$("#popupContent").append('<div class="clearfix"></div>');
		if (orders[2] == 0) {$("#popupContent").append('<div class="order2 order">2</div>')} else {$("#popupContent").append('<div class="order2 noorder"></div>')};
		for (i=3; i<7; i++) {
			if (orders[i] < 2) {$("#popupContent").append('<div class="order'+i+' order">'+i+'</div>')} else {$("#popupContent").append('<div class="order'+i+' noorder"></div>')};
		};
		$("#popupContent").append('<div class="clearfix"></div>');
		for (i=7; i<12; i++) {
			if (eval($('#'+ terrname +' .order').html()) < 7) {
				if (orders[i] == 0 && orders[12] < maxspecial) {$("#popupContent").append('<div class="order'+i+' order">'+i+'</div>')} else {$("#popupContent").append('<div class="order'+i+' noorder"></div>')};
			} else {
				if (orders[i] == 0) {$("#popupContent").append('<div class="order'+i+' order">'+i+'</div>')} else {$("#popupContent").append('<div class="order'+i+' noorder"></div>')};
			}
		};
		
		$("#popupError").html('');
		//centering with css  
		centerPopup();  
		//load popup  
		loadPopup();
		
		//assign order
		$("#popupContent div.order").click(function(){
			orders[$('#'+ terrname +' .order').html()]--;
			if (eval($('#'+ terrname +' .order').html()) > 6) {orders[12]--};
			eval('units.'+terrname+'.prikaz = 0');
			$('#'+ terrname +' .order').remove();
			
			$.ajax({
			  url: "php/remove_order.php",
			  type: "GET",
			  data: {table: terr, mesto:terrname},
			  async: false
			});
			
			$('#'+ terrname).append('<div class="order'+ $(this).html() +' order">'+$(this).html()+'</div>');
			orders[$(this).html()]++;
			if (eval($(this).html()) > 6) {orders[12]++};
			eval('units.'+terrname+'.prikaz = '+$(this).html());
			
			$.ajax({
			  url: "php/assign_order.php",
			  type: "GET",
			  data: {table: terr, mesto:terrname, prikaz:$(this).html()},
			  async: false
			});
			disablePopup();
			faza = 5;
			$.get('php/next_phase.php',{id: game_id, table: terr});
			$('#phase').html('Raids');
			return false;
		});
	}
}

//Raid phase function
function raidphase(terrname) {
	if ( eval('units.'+terrname+'.unit1') !=0 && eval('units.'+terrname+'.control') == mycontrol) {
		if (eval('prikazi5.'+terrname+'.prikaz') == 4 || eval('prikazi5.'+terrname+'.prikaz') == 9){
			if (starting == 0) {
				starting = terrname;
				$('#'+ terrname).addClass("starting");
				loadReady();
			} else if (starting == terrname) {
				eval('prikazi5.'+starting+'.prikaz = 0');
				$('#'+ starting +' .order').remove();
				$('#'+ starting).removeClass("starting");
				$.get('php/raid_order.php',{table: terr, id: game_id, starting:starting, target:starting});
				starting = 0;
				disableReady();
			}
		} 
	} else if (eval('prikazi5.'+terrname+'.prikaz') != 0 && eval('units.'+terrname+'.control') != mycontrol && starting != 0) {
		target = terrname;
		if (eval('karta.'+starting+'.'+target) == 1 || eval('karta.'+starting+'.'+target) == 3 || eval('karta.'+starting+'.'+target) == 5) {
			if (eval('prikazi5.'+target+'.prikaz') > 3 && eval('prikazi5.'+target+'.prikaz') != 7 && eval('prikazi5.'+target+'.prikaz') != 8) {
				if (eval('prikazi5.'+target+'.prikaz') == 6 || eval('prikazi5.'+target+'.prikaz') == 11) {
					$.get('php/raid_consolidate.php',{table: house, raider: eval('units.'+starting+'.control'), victim: eval('units.'+target+'.control')});
				}
				eval('prikazi5.'+starting+'.prikaz = 0');
				eval('prikazi5.'+target+'.prikaz = 0');
				$('#'+ starting +' .order').remove();
				$('#'+ starting).removeClass("starting");
				$('#'+ target +' .order').remove();
				$.get('php/raid_order.php',{table: terr, id: game_id, starting:starting, target:target});
				starting = 0;
				disableReady();
			} else if ((eval('prikazi5.'+target+'.prikaz') == 3 || eval('prikazi5.'+target+'.prikaz') == 8) && eval('prikazi5.'+starting+'.prikaz') == 9) {
				eval('prikazi5.'+starting+'.prikaz = 0');
				eval('prikazi5.'+target+'.prikaz = 0');
				$('#'+ starting +' .order').remove();
				$('#'+ starting).removeClass("starting");
				$('#'+ target +' .order').remove();
				$.get('php/raid_order.php',{table: terr, id: game_id, starting:starting, target:target});
				starting = 0;
				disableReady();
			}
		}
	}
};

//March phase function for land units
function marchphase(terrname) {
	if ( eval('units.'+terrname+'.unit1') !=0 && eval('units.'+terrname+'.control') == mycontrol) {
		if (eval('units.'+terrname+'.prikaz') == 1 || eval('units.'+terrname+'.prikaz') == 2 || eval('units.'+terrname+'.prikaz') == 7){
			if (starting == 0) {
				starting = terrname;
				$('#'+ terrname).addClass("starting");
				loadReady();
				renewkarta(terrname, mycontrol);
				clearInterval(myInterval);
			} else if (starting == terrname) {
				$.get('php/remove_order.php',{table: terr, mesto:starting});
				$('#'+ starting).removeClass("starting");
				starting = 0;
				disableReady();
				$.get('php/player_notready.php',{table: house, myhouse: myhouse, id: game_id});
				currentplayer = 0;
				$.get('php/march_next.php',{table: terr, id: game_id});
				myInterval = setInterval("refresh();", 3000);
			}
		} 
	}; 
	if (starting != 0 && terrname != starting) {
		target = terrname;
		var attacker = new Array( 0, 0, 0, 0);
		//check if territory available
		if (eval('karta.'+starting+'.'+target) == 1 || eval('karta2.'+starting+'.'+target) == 4) {
			
			//target territory with enemy army
			if (eval('units.'+target+'.control') != mycontrol && (eval('units.'+target+'.unit1') != 0 || eval('units.'+target+'.garrison') != 0)) {
				//attacking neutral stronghold
				if (eval('units.'+target+'.garrison') != 0 && eval('units.'+target+'.control') == 1){
					if (eval('units.'+starting+'.unit2') !=0) {//if attack with 2 or more units
						//units selection
						$("#popupContent").html('<p>Click on unit to select:</p>');
						var tempval = 'units.'+starting+'.';
						placeunitmarch(tempval, 'popupContent', mycontrol);
						$("#popupContent").append('<div class="clearfix"></div><a class="button Select" href="#">OK</a>');
						$("#popupError").html('');
						//centering with css  
						centerPopup();  
						//load popup  
						loadPopup();
						
						//click on unit
						$("#popupContent div.selectunit").click(function(){
							var nomer = $(this).html();
							nomer = nomer.replace(/unit/, '');
							
							if ($(this).hasClass('selected')) {
								$(this).removeClass('selected');
								attacker[nomer-1] = 0;
							} else {
								$(this).addClass('selected');
								attacker[nomer-1] = $(this).html();
							}
							
							return false;
						});
						
						//click on Select button
						$("#popupContent a.Select").click(function(){
							
							attacker.sort(compare);
							
							//make backup
							var startingbackup = cloneObj(eval('units.'+starting));
							var targetbackup = cloneObj(eval('units.'+target));
							
							//forming new units object
							if (attacker[0] != 0) {
								eval('units.'+target+'.unit1 = units.'+starting+'.'+attacker[0]);
								eval('units.'+starting+'.'+attacker[0]+' = 0');
								if (attacker[1] != 0) {
									eval('units.'+target+'.unit2 = units.'+starting+'.'+attacker[1]);
									eval('units.'+starting+'.'+attacker[1]+' = 0');
									if (attacker[2] != 0) {
										eval('units.'+target+'.unit3 = units.'+starting+'.'+attacker[2]);
										eval('units.'+starting+'.'+attacker[2]+' = 0');
										if (attacker[3] != 0) {
											eval('units.'+target+'.unit4 = units.'+starting+'.'+attacker[3]);
											eval('units.'+starting+'.'+attacker[3]+' = 0');
										}
									}
								}
							}
							
							eval('units.'+target+'.control = "'+mycontrol+'"');
							
							//sorting remain starting units
							tempattack = new Array(eval('units.'+starting+'.unit1'), eval('units.'+starting+'.unit2'), eval('units.'+starting+'.unit3'), eval('units.'+starting+'.unit4'));
							tempattack.sort(compare);
							eval('units.'+starting+'.unit1 = "'+tempattack[0]+'"');
							eval('units.'+starting+'.unit2 = "'+tempattack[1]+'"');
							eval('units.'+starting+'.unit3 = "'+tempattack[2]+'"');
							eval('units.'+starting+'.unit4 = "'+tempattack[3]+'"');
							
							//check new limits
							if (supplylimit(mycontrol, myhouse) && attacker[0] != 0) {
								disableReady();
								disablePopup();
								$.get('php/capture_neutral.php',{table: terr, id: game_id, starting:starting, target:target, unit1:attacker[0], unit2:attacker[1], unit3:attacker[2], unit4:attacker[3], order: eval('units.'+starting+'.prikaz')});
								$('#'+ starting).removeClass("starting");
								//leave token, remove order, minus zamok for starting territory
								leavetoken(starting);
								$.get('php/player_notready.php',{table: house, myhouse: myhouse, id: game_id});
								starting = 0;
								currentplayer = 0;
							} else {
								disablePopup();
								$("#popup3Content").html('<p>Not enough supply!</p><a id="popupOk" class="button">OK</a>');
								centerPopup3();
								loadPopup3();
								eval('units.'+starting+' = cloneObj(startingbackup)');
								eval('units.'+target+' = cloneObj(targetbackup)');
							}
							return false;
						}); //end of select button
						
					} else { //if starting territory with single unit
						
						//make backup
						var startingbackup = cloneObj(eval('units.'+starting));
						var targetbackup = cloneObj(eval('units.'+target));
						
						//forming new units object
						eval('units.'+target+'.unit1 = units.'+starting+'.unit1');
						eval('units.'+starting+'.unit1 = 0');
						
						eval('units.'+target+'.control = "'+mycontrol+'"');
						
						//check new limits
						if (supplylimit(mycontrol, myhouse)) {
							$.get('php/capture_neutral.php',{table: terr, id: game_id, starting:starting, target:target, unit1:'unit1', unit2:0, unit3:0, unit4:0, order: eval('units.'+starting+'.prikaz')});
							$('#'+ starting).removeClass("starting");
							//leave token, remove order, minus zamok for starting territory
							leavetoken(starting);
							$.get('php/player_notready.php',{table: house, myhouse: myhouse, id: game_id});
							starting = 0;
							currentplayer = 0;
						} else {
							$("#popup3Content").html('<p>Not enough supply!</p><a id="popupOk" class="button">OK</a>');
							centerPopup3();
							loadPopup3();
							eval('units.'+starting+' = cloneObj(startingbackup)');
							eval('units.'+target+' = cloneObj(targetbackup)');
						}
					}//end of "if starting territory with single unit"
					
					
				} else {//battle with enemy army
					if (eval('units.'+starting+'.unit2') !=0) {//if attack with 2 or more units
						//units selection
						$("#popupContent").html('<p>Click on unit to select:</p>');
						var tempval = 'units.'+starting+'.';
						placeunitmarch(tempval, 'popupContent', mycontrol);
						$("#popupContent").append('<div class="clearfix"></div><a class="button Select" href="#">OK</a>');
						$("#popupError").html('');
						//centering with css  
						centerPopup();  
						//load popup  
						loadPopup();
						
						//click on unit
						$("#popupContent div.selectunit").click(function(){
							var nomer = $(this).html();
							nomer = nomer.replace(/unit/, '');
							
							if ($(this).hasClass('selected')) {
								$(this).removeClass('selected');
								attacker[nomer-1] = 0;
							} else {
								$(this).addClass('selected');
								attacker[nomer-1] = $(this).html();
							}
							
							return false;
						});
						
						//click on Select button
						$("#popupContent a.Select").click(function(){
							
							attacker.sort(compare);
							
							//make backup
							var startingbackup = cloneObj(eval('units.'+starting));
							var targetbackup = cloneObj(eval('units.'+target));
							
							//forming new units object
							if (attacker[0] != 0) {
								eval('units.'+target+'.unit1 = units.'+starting+'.'+attacker[0]);
								eval('units.'+starting+'.'+attacker[0]+' = 0');
								eval('units.'+target+'.unit2 = 0');
								eval('units.'+target+'.unit3 = 0');
								eval('units.'+target+'.unit4 = 0');
								if (attacker[1] != 0) {
									eval('units.'+target+'.unit2 = units.'+starting+'.'+attacker[1]);
									eval('units.'+starting+'.'+attacker[1]+' = 0');
									if (attacker[2] != 0) {
										eval('units.'+target+'.unit3 = units.'+starting+'.'+attacker[2]);
										eval('units.'+starting+'.'+attacker[2]+' = 0');
										if (attacker[3] != 0) {
											eval('units.'+target+'.unit4 = units.'+starting+'.'+attacker[3]);
											eval('units.'+starting+'.'+attacker[3]+' = 0');
										}
									}
								}
							}
							
							eval('units.'+target+'.control = "'+mycontrol+'"');
							
							//sorting remain starting units
							tempattack = new Array(eval('units.'+starting+'.unit1'), eval('units.'+starting+'.unit2'), eval('units.'+starting+'.unit3'), eval('units.'+starting+'.unit4'));
							tempattack.sort(compare);
							eval('units.'+starting+'.unit1 = "'+tempattack[0]+'"');
							eval('units.'+starting+'.unit2 = "'+tempattack[1]+'"');
							eval('units.'+starting+'.unit3 = "'+tempattack[2]+'"');
							eval('units.'+starting+'.unit4 = "'+tempattack[3]+'"');
							
							//check new limits
							if (supplylimit(mycontrol, myhouse) && attacker[0] != 0) {
								disableReady();
								disablePopup();
								$.get('php/start_battle.php',{table: terr, id: game_id, starting:starting, target:target, unit1:attacker[0], unit2:attacker[1], unit3:attacker[2], unit4:attacker[3], order: eval('units.'+starting+'.prikaz')});
								$('#'+ starting).removeClass("starting");
								//leave token, remove order, minus zamok for starting territory
								leavetoken(starting);
								$.get('php/player_notready.php',{table: house, myhouse: myhouse, id: game_id});
								starting = 0;
								currentplayer = 0;
							} else {
								disablePopup();
								$("#popup3Content").html('<p>Not enough supply!</p><a id="popupOk" class="button">OK</a>');
								centerPopup3();
								loadPopup3();
								eval('units.'+starting+' = cloneObj(startingbackup)');
								eval('units.'+target+' = cloneObj(targetbackup)');
							};
							return false;
						}); //end of select button
						
					} else { //if starting territory with single unit
						
						//make backup
						var startingbackup = cloneObj(eval('units.'+starting));
						var targetbackup = cloneObj(eval('units.'+target));
						
						//forming new units object
						eval('units.'+target+'.unit1 = units.'+starting+'.unit1');
						eval('units.'+starting+'.unit1 = 0');
						eval('units.'+target+'.unit2 = 0');
						eval('units.'+target+'.unit3 = 0');
						eval('units.'+target+'.unit4 = 0');
						eval('units.'+target+'.control = "'+mycontrol+'"');
						
						//check new limits
						if (supplylimit(mycontrol, myhouse)) {
							$.get('php/start_battle.php',{table: terr, id: game_id, starting:starting, target:target, unit1:'unit1', unit2:0, unit3:0, unit4:0, order: eval('units.'+starting+'.prikaz')});
							$('#'+ starting).removeClass("starting");
							//leave token, remove order, minus zamok for starting territory
							leavetoken(starting);
							$.get('php/player_notready.php',{table: house, myhouse: myhouse, id: game_id});
							starting = 0;
							currentplayer = 0;
						} else {
							$("#popup3Content").html('<p>Not enough supply!</p><a id="popupOk" class="button">OK</a>');
							centerPopup3();
							loadPopup3();
							eval('units.'+starting+' = cloneObj(startingbackup)');
							eval('units.'+target+' = cloneObj(targetbackup)');
						}
					}//end of "if starting territory with single unit"
				
				};
				
			} else if (eval('units.'+target+'.unit4') == 0) { //target territory without enemy army and some space for new unit
				//select units from starting territory if there is army of 2 or more units
				if (eval('units.'+starting+'.unit2') !=0) {
					//units selection
					$("#popupContent").html('<p>Click on unit to select:</p>');
					var tempval = 'units.'+starting+'.';
					placeunitmarch(tempval, 'popupContent', mycontrol);
					$("#popupContent").append('<div class="clearfix"></div><a class="button Select" href="#">OK</a>');
					$("#popupError").html('');
					//centering with css  
					centerPopup();  
					//load popup  
					loadPopup();
					//check free space in target
					if (eval('units.'+target+'.unit1') ==0) {
						var freespace = 4;
					} else if (eval('units.'+target+'.unit2') ==0) {
						var freespace = 3;
					} else if (eval('units.'+target+'.unit3') ==0) {
						var freespace = 2;
					} else {
						var freespace = 1;
					}
					var moveunits = 0;
					//click on unit
					$("#popupContent div.selectunit").click(function(){
						var nomer = $(this).html();
						nomer = nomer.replace(/unit/, '');
						
						if ($(this).hasClass('selected')) {
							$(this).removeClass('selected');
							attacker[nomer-1] = 0;
							moveunits--;
						} else if (moveunits < freespace) {
							$(this).addClass('selected');
							attacker[nomer-1] = $(this).html();
							moveunits++;
						}
						
						return false;
					});
					
					//click on Select button
					$("#popupContent a.Select").click(function(){
						
						attacker.sort(compare);
						
						//make backup
						var startingbackup = cloneObj(eval('units.'+starting));
						var targetbackup = cloneObj(eval('units.'+target));
						
						//forming new units object
						if (eval('units.'+target+'.unit1') == 0) {
							if (attacker[0] != 0) {
								eval('units.'+target+'.unit1 = units.'+starting+'.'+attacker[0]);
								eval('units.'+starting+'.'+attacker[0]+' = 0');
								if (attacker[1] != 0) {
									eval('units.'+target+'.unit2 = units.'+starting+'.'+attacker[1]);
									eval('units.'+starting+'.'+attacker[1]+' = 0');
									if (attacker[2] != 0) {
										eval('units.'+target+'.unit3 = units.'+starting+'.'+attacker[2]);
										eval('units.'+starting+'.'+attacker[2]+' = 0');
										if (attacker[3] != 0) {
											eval('units.'+target+'.unit4 = units.'+starting+'.'+attacker[3]);
											eval('units.'+starting+'.'+attacker[3]+' = 0');
										}
									}
								}
							}
						} else if (eval('units.'+target+'.unit2') == 0) {
							if (attacker[0] != 0) {
								eval('units.'+target+'.unit2 = units.'+starting+'.'+attacker[0]);
								eval('units.'+starting+'.'+attacker[0]+' = 0');
								if (attacker[1] != 0) {
									eval('units.'+target+'.unit3 = units.'+starting+'.'+attacker[1]);
									eval('units.'+starting+'.'+attacker[1]+' = 0');
									if (attacker[2] != 0) {
										eval('units.'+target+'.unit4 = units.'+starting+'.'+attacker[2]);
										eval('units.'+starting+'.'+attacker[2]+' = 0');
									}
								}
							}
						} else if (eval('units.'+target+'.unit3') == 0) {
							if (attacker[0] != 0) {
								eval('units.'+target+'.unit3 = units.'+starting+'.'+attacker[0]);
								eval('units.'+starting+'.'+attacker[0]+' = 0');
								if (attacker[1] != 0) {
									eval('units.'+target+'.unit4 = units.'+starting+'.'+attacker[1]);
									eval('units.'+starting+'.'+attacker[1]+' = 0');
								}
							}
						} else {
							if (attacker[0] != 0) {
								eval('units.'+target+'.unit4 = units.'+starting+'.'+attacker[0]);
								eval('units.'+starting+'.'+attacker[0]+' = 0');
							}
						}
						eval('units.'+target+'.control = "'+mycontrol+'"');
						
						//sorting remain starting units
						tempattack = new Array(eval('units.'+starting+'.unit1'), eval('units.'+starting+'.unit2'), eval('units.'+starting+'.unit3'), eval('units.'+starting+'.unit4'));
						tempattack.sort(compare);
						eval('units.'+starting+'.unit1 = "'+tempattack[0]+'"');
						eval('units.'+starting+'.unit2 = "'+tempattack[1]+'"');
						eval('units.'+starting+'.unit3 = "'+tempattack[2]+'"');
						eval('units.'+starting+'.unit4 = "'+tempattack[3]+'"');
						
						//check new limits
						if (supplylimit(mycontrol, myhouse) && attacker[0] != 0) {
							disableReady();
							disablePopup();
							
							//change tokob of previous owner of target and delete his token
							if (targetbackup.token == 1 && targetbackup.control != mycontrol) {
								$.get('php/minus_tokob.php',{table: terr, target:target, house:house, victim:targetbackup.control});
								eval('units.'+target+'.token = 0');
							}
							
							$('#board .land').each(function() {
								$(this).html('');
								var tempval = 'units.'+$(this).attr("id")+'.';
								var house = eval('units.'+$(this).attr("id")+'.control');
								placeunit(tempval, $(this).attr("id"), house);
								placegar(tempval, $(this).attr("id"));
								placetoken(tempval, $(this).attr("id"), house);
							});
							$.get('php/march_order.php',{table: terr, id: game_id, starting:starting, target:target, unit1:attacker[0], unit2:attacker[1], unit3:attacker[2], unit4:attacker[3]});
							//change victory track
							if (eval('units.'+target+'.castle')!=0 && eval('units.'+target+'.control')!=mycontrol) {
								$.get('php/minus_zamok.php',{house:house, victim:targetbackup.control});
								$.get('php/plus_zamok.php',{house:house, victim:myhouse});
								//if territory with port
								if (document.getElementById(target+'Port') != null) {
									captureport2(target+'Port');
								} else {
									marchphaseend2();
								};
							} else {
								marchphaseend2();
							};
						} else {
							disablePopup();
							$("#popup3Content").html('<p>Not enough supply!</p><a id="popupOk" class="button">OK</a>');
							centerPopup3();
							loadPopup3();
							eval('units.'+starting+' = cloneObj(startingbackup)');
							eval('units.'+target+' = cloneObj(targetbackup)');
						}
						return false;
					}); //end of select button
					
				} else { //if starting territory with single unit
					
					//make backup
					var startingbackup = cloneObj(eval('units.'+starting));
					var targetbackup = cloneObj(eval('units.'+target));
					
					//forming new units object
					if (eval('units.'+target+'.unit1') == 0) {
						eval('units.'+target+'.unit1 = units.'+starting+'.unit1');
						eval('units.'+starting+'.unit1 = 0');
					} else if (eval('units.'+target+'.unit2') == 0) {
						eval('units.'+target+'.unit2 = units.'+starting+'.unit1');
						eval('units.'+starting+'.unit1 = 0');
					} else if (eval('units.'+target+'.unit3') == 0) {
						eval('units.'+target+'.unit3 = units.'+starting+'.unit1');
						eval('units.'+starting+'.unit1 = 0');
					} else {
						eval('units.'+target+'.unit4 = units.'+starting+'.unit1');
						eval('units.'+starting+'.unit1 = 0');
					}
					eval('units.'+target+'.control = "'+mycontrol+'"');
					
					//check new limits
					if (supplylimit(mycontrol, myhouse)) {
						//change tokob of previous owner of target and delete his token
						if (targetbackup.token == 1 && targetbackup.control != mycontrol) {
							$.get('php/minus_tokob.php',{table: terr, target:target, house:house, victim:targetbackup.control});
							eval('units.'+target+'.token = 0');
						}
						
						$('#board .land').each(function() {
							$(this).html('');
							var tempval = 'units.'+$(this).attr("id")+'.';
							var house = eval('units.'+$(this).attr("id")+'.control');
							placeunit(tempval, $(this).attr("id"), house);
							placegar(tempval, $(this).attr("id"));
							placetoken(tempval, $(this).attr("id"), house);
						});
						$.get('php/march_order.php',{table: terr, id: game_id, starting:starting, target:target, unit1:'unit1', unit2:0, unit3:0, unit4:0});
						//change victory track
						if (eval('units.'+target+'.castle')!=0) {
							$.get('php/minus_zamok.php',{house:house, victim:targetbackup.control});
							$.get('php/plus_zamok.php',{house:house, victim:myhouse});
							//if territory with port
							if (document.getElementById(target+'Port') != null) {
								captureport(target+'Port');
							} else {
								marchphaseend();
							};
						} else {
							marchphaseend();
						};
					} else {
						$("#popup3Content").html('<p>Not enough supply!</p><a id="popupOk" class="button">OK</a>');
						centerPopup3();
						loadPopup3();
						eval('units.'+starting+' = cloneObj(startingbackup)');
						eval('units.'+target+' = cloneObj(targetbackup)');
					}
				}//end of "if starting territory with single unit"
				
			
			}//end of "target territory without enemy army and some space for new unit"
		};
	};
};
//end of marchphase function
function marchphaseend() {
	$('#'+ starting).removeClass("starting");
	//leave token, remove order, minus zamok for starting territory
	leavetoken(starting);
	$.get('php/player_notready.php',{table: house, myhouse: myhouse, id: game_id});
	disableReady();
	currentplayer = 0;
	$.get('php/march_next.php',{table: terr, id: game_id, mesto:starting});
	starting = 0;
};

//end of marchphase function 2
function marchphaseend2() {
	if (eval('units.'+starting+'.unit1') == 'F1' || eval('units.'+starting+'.unit1') == 'K1' || eval('units.'+starting+'.unit1') == 'E1' || eval('units.'+starting+'.unit1') == 'S1' || eval('units.'+starting+'.unit2') == 'F1' || eval('units.'+starting+'.unit2') == 'K1' || eval('units.'+starting+'.unit2') == 'E1' || eval('units.'+starting+'.unit2') == 'S1' || eval('units.'+starting+'.unit3') == 'F1' || eval('units.'+starting+'.unit3') == 'K1' || eval('units.'+starting+'.unit3') == 'E1' || eval('units.'+starting+'.unit3') == 'S1') {
		$.get('php/remove_order.php',{table: terr, mesto:starting});
		$.get('php/player_ready.php',{table: house, myhouse: myhouse, id: game_id});
	} else {
		$('#'+ starting).removeClass("starting");
		//leave token, remove order, minus zamok for starting territory
		leavetoken(starting);
		$.get('php/player_notready.php',{table: house, myhouse: myhouse, id: game_id});
		currentplayer = 0;
		$.get('php/march_next.php',{table: terr, id: game_id, mesto:starting});
		starting = 0;
	};
};

//March phase function for water units
function marchphase2(terrname) {
	if ( eval('units.'+terrname+'.unit1') !=0 && eval('units.'+terrname+'.control') == mycontrol) {
		if (eval('units.'+terrname+'.prikaz') == 1 || eval('units.'+terrname+'.prikaz') == 2 || eval('units.'+terrname+'.prikaz') == 7){
			if (starting == 0) {
				starting = terrname;
				$('#'+ terrname).addClass("starting");
				loadReady();
				clearInterval(myInterval);
			} else if (starting == terrname) {
				$.get('php/remove_order.php',{table: terr, mesto:starting});
				$('#'+ starting).removeClass("starting");
				starting = 0;
				disableReady();
				$.get('php/player_notready.php',{table: house, myhouse: myhouse, id: game_id});
				currentplayer = 0;
				$.get('php/march_next.php',{table: terr, id: game_id});
				myInterval = setInterval("refresh();", 3000);
			}
		} 
	}; 
	if (starting != 0 && terrname != starting) {
		target = terrname;
		var attacker = new Array( 0, 0, 0, 0);
		//check if territory available
		if (eval('karta.'+starting+'.'+target) == 1) {
			//target territory with enemy army
			if (eval('units.'+target+'.control') != mycontrol && eval('units.'+target+'.unit1') != 0) {
				//battle with enemy army
				if (eval('units.'+starting+'.unit2') !=0) {//if attack with 2 or more units
					//units selection
					$("#popupContent").html('<p>Click on unit to select:</p>');
					var tempval = 'units.'+starting+'.';
					placeunitmarch(tempval, 'popupContent', mycontrol);
					$("#popupContent").append('<div class="clearfix"></div><a class="button Select" href="#">OK</a>');
					$("#popupError").html('');
					//centering with css  
					centerPopup();  
					//load popup  
					loadPopup();
					
					//click on unit
					$("#popupContent div.selectunit").click(function(){
						var nomer = $(this).html();
						nomer = nomer.replace(/unit/, '');
						
						if ($(this).hasClass('selected')) {
							$(this).removeClass('selected');
							attacker[nomer-1] = 0;
						} else {
							$(this).addClass('selected');
							attacker[nomer-1] = $(this).html();
						}
						
						return false;
					});
					
					//click on Select button
					$("#popupContent a.Select").click(function(){
						
						attacker.sort(compare);
						
						//make backup
						var startingbackup = cloneObj(eval('units.'+starting));
						var targetbackup = cloneObj(eval('units.'+target));
						
						//forming new units object
						if (attacker[0] != 0) {
							eval('units.'+target+'.unit1 = units.'+starting+'.'+attacker[0]);
							eval('units.'+starting+'.'+attacker[0]+' = 0');
							if (attacker[1] != 0) {
								eval('units.'+target+'.unit2 = units.'+starting+'.'+attacker[1]);
								eval('units.'+starting+'.'+attacker[1]+' = 0');
								if (attacker[2] != 0) {
									eval('units.'+target+'.unit3 = units.'+starting+'.'+attacker[2]);
									eval('units.'+starting+'.'+attacker[2]+' = 0');
									if (attacker[3] != 0) {
										eval('units.'+target+'.unit4 = units.'+starting+'.'+attacker[3]);
										eval('units.'+starting+'.'+attacker[3]+' = 0');
									}
								}
							}
						}
						
						eval('units.'+target+'.control = "'+mycontrol+'"');
						
						//sorting remain starting units
						tempattack = new Array(eval('units.'+starting+'.unit1'), eval('units.'+starting+'.unit2'), eval('units.'+starting+'.unit3'), eval('units.'+starting+'.unit4'));
						tempattack.sort(compare);
						eval('units.'+starting+'.unit1 = "'+tempattack[0]+'"');
						eval('units.'+starting+'.unit2 = "'+tempattack[1]+'"');
						eval('units.'+starting+'.unit3 = "'+tempattack[2]+'"');
						eval('units.'+starting+'.unit4 = "'+tempattack[3]+'"');
						

						//check new limits
						if (supplylimit(mycontrol, myhouse) && attacker[0] != 0) {
							disableReady();
							disablePopup();
							$.get('php/start_battle.php',{table: terr, id: game_id, starting:starting, target:target, unit1:attacker[0], unit2:attacker[1], unit3:attacker[2], unit4:attacker[3], order: eval('units.'+starting+'.prikaz')});
							$('#'+ starting).removeClass("starting");
							//remove order from starting territory
							$.get('php/remove_order.php',{table: terr, mesto:starting});
							$.get('php/player_notready.php',{table: house, myhouse: myhouse, id: game_id});
							starting = 0;
							currentplayer = 0;
							myInterval = setInterval("refresh();", 3000);
							
						} else {
							disablePopup();
							$("#popup3Content").html('<p>Not enough supply!</p><a id="popupOk" class="button">OK</a>');
							centerPopup3();
							loadPopup3();
							eval('units.'+starting+' = cloneObj(startingbackup)');
							eval('units.'+target+' = cloneObj(targetbackup)');
						}
						return false;
					}); //end of select button
					
				} else { //if starting territory with single unit
					
					//make backup
					var startingbackup = cloneObj(eval('units.'+starting));
					var targetbackup = cloneObj(eval('units.'+target));
					
					//forming new units object
					eval('units.'+target+'.unit1 = units.'+starting+'.unit1');
					eval('units.'+starting+'.unit1 = 0');
					
					eval('units.'+target+'.control = "'+mycontrol+'"');
					
					//check new limits
					if (supplylimit(mycontrol, myhouse)) {
						$.get('php/start_battle.php',{table: terr, id: game_id, starting:starting, target:target, unit1:'unit1', unit2:0, unit3:0, unit4:0, order: eval('units.'+starting+'.prikaz')});
						$('#'+ starting).removeClass("starting");
						//remove order from starting territory
						$.get('php/remove_order.php',{table: terr, mesto:starting});
						$.get('php/player_notready.php',{table: house, myhouse: myhouse, id: game_id});
						starting = 0;
						currentplayer = 0;
						myInterval = setInterval("refresh();", 3000);
					} else {
						$("#popup3Content").html('<p>Not enough supply!</p><a id="popupOk" class="button">OK</a>');
						centerPopup3();
						loadPopup3();
						eval('units.'+starting+' = cloneObj(startingbackup)');
						eval('units.'+target+' = cloneObj(targetbackup)');
					}
				}//end of "if starting territory with single unit"
				
			} else if (eval('units.'+target+'.unit4') == 0) { //target territory without enemy army and some space for new unit
				//select units from starting territory if there is army of 2 or more units
				if (eval('units.'+starting+'.unit2') !=0) {
					//units selection
					$("#popupContent").html('<p>Click on unit to select:</p>');
					var tempval = 'units.'+starting+'.';
					placeunitmarch(tempval, 'popupContent', mycontrol);
					$("#popupContent").append('<div class="clearfix"></div><a class="button Select" href="#">OK</a>');
					$("#popupError").html('');
					//centering with css  
					centerPopup();  
					//load popup  
					loadPopup();
					//check free space in target
					if (eval('units.'+target+'.unit1') ==0) {
						var freespace = 4;
					} else if (eval('units.'+target+'.unit2') ==0) {
						var freespace = 3;
					} else if (eval('units.'+target+'.unit3') ==0) {
						var freespace = 2;
					} else {
						var freespace = 1;
					}
					var moveunits = 0;
					//click on unit
					$("#popupContent div.selectunit").click(function(){
						var nomer = $(this).html();
						nomer = nomer.replace(/unit/, '');
						
						if ($(this).hasClass('selected')) {
							$(this).removeClass('selected');
							attacker[nomer-1] = 0;
							moveunits--;
						} else if (moveunits < freespace) {
							$(this).addClass('selected');
							attacker[nomer-1] = $(this).html();
							moveunits++;
						}
						
						return false;
					});
					
					//click on Select button
					$("#popupContent a.Select").click(function(){
						
						attacker.sort(compare);
						
						//make backup
						var startingbackup = cloneObj(eval('units.'+starting));
						var targetbackup = cloneObj(eval('units.'+target));
						
						//forming new units object
						if (eval('units.'+target+'.unit1') == 0) {
							if (attacker[0] != 0) {
								eval('units.'+target+'.unit1 = units.'+starting+'.'+attacker[0]);
								eval('units.'+starting+'.'+attacker[0]+' = 0');
								if (attacker[1] != 0) {
									eval('units.'+target+'.unit2 = units.'+starting+'.'+attacker[1]);
									eval('units.'+starting+'.'+attacker[1]+' = 0');
									if (attacker[2] != 0) {
										eval('units.'+target+'.unit3 = units.'+starting+'.'+attacker[2]);
										eval('units.'+starting+'.'+attacker[2]+' = 0');
										if (attacker[3] != 0) {
											eval('units.'+target+'.unit4 = units.'+starting+'.'+attacker[3]);
											eval('units.'+starting+'.'+attacker[3]+' = 0');
										}
									}
								}
							}
						} else if (eval('units.'+target+'.unit2') == 0) {
							if (attacker[0] != 0) {
								eval('units.'+target+'.unit2 = units.'+starting+'.'+attacker[0]);
								eval('units.'+starting+'.'+attacker[0]+' = 0');
								if (attacker[1] != 0) {
									eval('units.'+target+'.unit3 = units.'+starting+'.'+attacker[1]);
									eval('units.'+starting+'.'+attacker[1]+' = 0');
									if (attacker[2] != 0) {
										eval('units.'+target+'.unit4 = units.'+starting+'.'+attacker[2]);
										eval('units.'+starting+'.'+attacker[2]+' = 0');
									}
								}
							}
						} else if (eval('units.'+target+'.unit3') == 0) {
							if (attacker[0] != 0) {
								eval('units.'+target+'.unit3 = units.'+starting+'.'+attacker[0]);
								eval('units.'+starting+'.'+attacker[0]+' = 0');
								if (attacker[1] != 0) {
									eval('units.'+target+'.unit4 = units.'+starting+'.'+attacker[1]);
									eval('units.'+starting+'.'+attacker[1]+' = 0');
								}
							}
						} else {
							if (attacker[0] != 0) {
								eval('units.'+target+'.unit4 = units.'+starting+'.'+attacker[0]);
								eval('units.'+starting+'.'+attacker[0]+' = 0');
							}
						}
						eval('units.'+target+'.control = "'+mycontrol+'"');
						
						//sorting remain starting units
						tempattack = new Array(eval('units.'+starting+'.unit1'), eval('units.'+starting+'.unit2'), eval('units.'+starting+'.unit3'), eval('units.'+starting+'.unit4'));
						tempattack.sort(compare);
						eval('units.'+starting+'.unit1 = "'+tempattack[0]+'"');
						eval('units.'+starting+'.unit2 = "'+tempattack[1]+'"');
						eval('units.'+starting+'.unit3 = "'+tempattack[2]+'"');
						eval('units.'+starting+'.unit4 = "'+tempattack[3]+'"');
						
						//check new limits
						if (supplylimit(mycontrol, myhouse) && attacker[0] != 0) {
							disableReady();
							disablePopup();
							
							$('#board .water').each(function() {
								$(this).html('');
								var tempval = 'units.'+$(this).attr("id")+'.';
								var house = eval('units.'+$(this).attr("id")+'.control');
								placeunit(tempval, $(this).attr("id"), house);
							});
							$.get('php/march_order.php',{table: terr, id: game_id, starting:starting, target:target, unit1:attacker[0], unit2:attacker[1], unit3:attacker[2], unit4:attacker[3]});
							if (eval('units.'+starting+'.unit1') == 'F1' || eval('units.'+starting+'.unit1') == 'K1' || eval('units.'+starting+'.unit1') == 'E1' || eval('units.'+starting+'.unit1') == 'S1' || eval('units.'+starting+'.unit2') == 'F1' || eval('units.'+starting+'.unit2') == 'K1' || eval('units.'+starting+'.unit2') == 'E1' || eval('units.'+starting+'.unit2') == 'S1' || eval('units.'+starting+'.unit3') == 'F1' || eval('units.'+starting+'.unit3') == 'K1' || eval('units.'+starting+'.unit3') == 'E1' || eval('units.'+starting+'.unit3') == 'S1') {
								$.get('php/remove_order.php',{table: terr, mesto:starting});
								$.get('php/player_ready.php',{table: house, myhouse: myhouse, id: game_id});
								
							} else {
								$('#'+ starting).removeClass("starting");
								//remove order from starting territory
								$.get('php/remove_order.php',{table: terr, mesto:starting});
								$.get('php/player_notready.php',{table: house, myhouse: myhouse, id: game_id});
								starting = 0;
								currentplayer = 0;
								$.get('php/march_next.php',{table: terr, id: game_id});
								myInterval = setInterval("refresh();", 3000);
								
							}
							
						} else {
							disablePopup();
							$("#popup3Content").html('<p>Not enough supply!</p><a id="popupOk" class="button">OK</a>');
							centerPopup3();
							loadPopup3();
							eval('units.'+starting+' = cloneObj(startingbackup)');
							eval('units.'+target+' = cloneObj(targetbackup)');
						}
						return false;
					}); //end of select button
					
				} else { //if starting territory with single unit
					
					//make backup
					var startingbackup = cloneObj(eval('units.'+starting));
					var targetbackup = cloneObj(eval('units.'+target));
					
					//forming new units object
					if (eval('units.'+target+'.unit1') == 0) {
						eval('units.'+target+'.unit1 = units.'+starting+'.unit1');
						eval('units.'+starting+'.unit1 = 0');
					} else if (eval('units.'+target+'.unit2') == 0) {
						eval('units.'+target+'.unit2 = units.'+starting+'.unit1');
						eval('units.'+starting+'.unit1 = 0');
					} else if (eval('units.'+target+'.unit3') == 0) {
						eval('units.'+target+'.unit3 = units.'+starting+'.unit1');
						eval('units.'+starting+'.unit1 = 0');
					} else {
						eval('units.'+target+'.unit4 = units.'+starting+'.unit1');
						eval('units.'+starting+'.unit1 = 0');
					}
					eval('units.'+target+'.control = "'+mycontrol+'"');
					
					//check new limits
					if (supplylimit(mycontrol, myhouse)) {
						$('#board .water').each(function() {
							$(this).html('');
							var tempval = 'units.'+$(this).attr("id")+'.';
							var house = eval('units.'+$(this).attr("id")+'.control');
							placeunit(tempval, $(this).attr("id"), house);
						});
						
						$.get('php/march_order.php',{table: terr, id: game_id, starting:starting, target:target, unit1:'unit1', unit2:0, unit3:0, unit4:0});
						
						$('#'+ starting).removeClass("starting");
						//remove order from starting territory
						$.get('php/remove_order.php',{table: terr, mesto:starting});
						$.get('php/player_notready.php',{table: house, myhouse: myhouse, id: game_id});
						starting = 0;
						disableReady();
						currentplayer = 0;
						$.get('php/march_next.php',{table: terr, id: game_id});
						myInterval = setInterval("refresh();", 3000);
						
					} else {
						$("#popup3Content").html('<p>Not enough supply!</p><a id="popupOk" class="button">OK</a>');
						centerPopup3();
						loadPopup3();
						eval('units.'+starting+' = cloneObj(startingbackup)');
						eval('units.'+target+' = cloneObj(targetbackup)');
					}
				}//end of "if starting territory with single unit"
				
			}//end of "target territory without enemy army and some space for new unit"
		};
	}
}

//Refresh route map with current ships positions
function renewkarta(terrname, mycontrol){
	eval('karta2.'+terrname+' = []');
	$('#board .water').each(function() {
		var water = $(this).attr("id");
		if (eval('karta.'+terrname+'.'+water) == 2 && eval('units.'+water+'.control') == mycontrol) {
			shipped(mycontrol, water, terrname, 0, 0);
		}
	});
};

function shipped(mycontrol ,water, terrname, prevwater1, prevwater2){
	$('#board .land').each(function() {
		var land = $(this).attr("id");
		if (eval('karta.'+water+'.'+land) == 3) {
			if (eval('karta.'+terrname+'.'+land) != 1) {
				eval('karta2.'+terrname+'.'+land+' = 4');
			}
		}
	});
	$('#board .water').each(function() {
		var waternext = $(this).attr("id");
		if (eval('karta.'+water+'.'+waternext) == 1 && eval('units.'+waternext+'.control') == mycontrol && waternext != prevwater1 && waternext != prevwater2) {
			shipped(mycontrol, waternext, terrname, water, prevwater1);
		}
	});
}

//Supply limits
function supplylimit(mycontrol, myhouse){
	var i = 0;
	for (j=0; j<5; j++) {army[j] = 0;};
	var FM = 0;
	var KN = 0;
	var EN = 0;
	var SH = 0;
	
	for (name in units) {
		var tempval = eval(units[name]);
		//count up units by type
		if (tempval.control == mycontrol && tempval.unit1 != 0) {
			if (tempval.unit1 == 'F1' || tempval.unit1 == 'F0') {
				FM++;			
			} else if (tempval.unit1 == 'K1' || tempval.unit1 == 'K0') {
				KN++;			
			} else if (tempval.unit1 == 'E1' || tempval.unit1 == 'E0') {
				EN++;			
			} else if (tempval.unit1 == 'S1' || tempval.unit1 == 'S0') {
				SH++;			
			}
			if (tempval.unit2 != 0) {
				if (tempval.unit2 == 'F1' || tempval.unit2 == 'F0') {
					FM++;			
				} else if (tempval.unit2 == 'K1' || tempval.unit2 == 'K0') {
					KN++;			
				} else if (tempval.unit2 == 'E1' || tempval.unit2 == 'E0') {
					EN++;			
				} else if (tempval.unit2 == 'S1' || tempval.unit2 == 'S0') {
					SH++;			
				}
				if (tempval.unit3 != 0) {
					if (tempval.unit3 == 'F1' || tempval.unit3 == 'F0') {
						FM++;			
					} else if (tempval.unit3 == 'K1' || tempval.unit3 == 'K0') {
						KN++;			
					} else if (tempval.unit3 == 'E1' || tempval.unit3 == 'E0') {
						EN++;			
					} else if (tempval.unit3 == 'S1' || tempval.unit3 == 'S0') {
						SH++;			
					}
					if (tempval.unit4 != 0) {
						if (tempval.unit4 == 'F1' || tempval.unit4 == 'F0') {
							FM++;			
						} else if (tempval.unit4 == 'K1' || tempval.unit4 == 'K0') {
							KN++;			
						} else if (tempval.unit4 == 'E1' || tempval.unit4 == 'E0') {
							EN++;			
						} else if (tempval.unit4 == 'S1' || tempval.unit4 == 'S0') {
							SH++;			
						}
						
					}
				}//army size
				if (tempval.unit4 != 0) {
					army[i] = 4;
					i++;
				} else if (tempval.unit3 != 0) {
					army[i] = 3;
					i++;
				} else {
					army[i] = 2;
					i++;
				}
			}
		}
	}
	
	//units type check
	if (EN>2 || SH>6 || KN>5 || FM>10) {
		return false;
	}
	
	army.sort(function(a,b){return b-a});
	
	//supply check
	if (eval('houses.'+myhouse+'.bochki') == 0) {
		return supplycheck(2, 2, 0, 0, 0);
	} else if (eval('houses.'+myhouse+'.bochki') == 1) {
		return supplycheck(3, 2, 0, 0, 0);
	} else if (eval('houses.'+myhouse+'.bochki') == 2) {
		return supplycheck(3, 2, 2, 0, 0);
	} else if (eval('houses.'+myhouse+'.bochki') == 3) {
		return supplycheck(3, 2, 2, 2, 0);
	} else if (eval('houses.'+myhouse+'.bochki') == 4) {
		return supplycheck(3, 3, 2, 2, 0);
	} else if (eval('houses.'+myhouse+'.bochki') == 5) {
		return supplycheck(4, 3, 2, 2, 0);
	} else if (eval('houses.'+myhouse+'.bochki') == 6) {
		return supplycheck(4, 3, 2, 2, 2);
	};
}
//Supply check function
function supplycheck(x1, x2, x3, x4, x5) {
	if (army[0] <= x1) {
		if (army[1] <= x2) {
			if (army[2] <= x3) {
				if (army[3] <= x4) {
					return army[4] <= x5;
				} else {
				return false;	
				}
			} else {
			return false;	
			}
		} else {
		return false;	
		}
	} else {
	return false;	
	}
}

//knights limits for Renly
function knightslimit(mycontrol){
	var KN = 0;
	for (name in units) {
		var tempval = eval(units[name]);
		//count up units by type
		if (tempval.control == mycontrol && tempval.unit1 != 0) {
			if (tempval.unit1 == 'K1' || tempval.unit1 == 'K0') {
				KN++;
			}
			if (tempval.unit2 != 0) {
				if (tempval.unit2 == 'K1' || tempval.unit2 == 'K0') {
					KN++;
				}
				if (tempval.unit3 != 0) {
					if (tempval.unit3 == 'K1' || tempval.unit3 == 'K0') {
						KN++;
					}
					if (tempval.unit4 != 0) {
						if (tempval.unit4 == 'K1' || tempval.unit4 == 'K0') {
							KN++;
						}

					}
				}
			}
		}
	};

	//units type check
	return KN <= 4;
};

function detunitmarch(data, id, unit, house) {
	//footman
	if (eval(data+unit)=='F1') {
		$("#"+id).append('<div class="'+ house +'F1 footman selectunit">'+unit+'</div>');
	} else {
		//knight
		if (eval(data+unit)=='K1') {
			$("#"+id).append('<div class="'+ house +'K1 knight selectunit">'+unit+'</div>');
		} else {
			//engine
			if (eval(data+unit)=='E1') {
				$("#"+id).append('<div class="'+ house +'E1 engine selectunit">'+unit+'</div>');
			} else {
				//ship
				if (eval(data+unit)=='S1') {
					$("#"+id).append('<div class="'+ house +'S1 ship selectunit">'+unit+'</div>');
				}
			}
		}
	}
}


//filling zone with units and orders
function placeunitmarch(data, id, house) {
	//unit1
	if (eval(data+'unit1') !=0) {
		detunitmarch(data, id, 'unit1', house);
		//unit2
		if (eval(data+'unit2') !=0) {
			detunitmarch(data, id, 'unit2', house);
			//unit3
			if (eval(data+'unit3') !=0) {
				detunitmarch(data, id, 'unit3', house);
				//unit4
				if (eval(data+'unit4') !=0) {
					detunitmarch(data, id, 'unit4', house);
				}
			}
		}
	}
};

//Leave power token? functiona and remove order on starting territory
function leavetoken(starting) {
	if (eval('units.'+starting+'.token')==0 && eval('units.'+starting+'.garrison')==0) {
		if (eval('houses.'+myhouse+'.tokih')>0) {
			$("#popup2Content").html('<p>Leave power token in '+starting+'?</p><a class="button yes" href="#">Yes</a><a class="button no" href="#">No</a>');
			$("#popup2Error").html('');
			//centering with css
			centerPopup2();
			//load popup
			loadPopup2();
			
			//click on Yes
			$("#popup2Content a.yes").click(function(){
				$.get('php/leave_token.php',{table: terr, mesto:starting, token:1, house:house, myhouse:myhouse});
				disablePopup2();
				myInterval = setInterval("refresh();", 3000);
				return false;
			});
			
			//click on No
			$("#popup2Content a.no").click(function(){
				$.get('php/leave_token.php',{table: terr, mesto:starting, token:0, house:house, myhouse:myhouse});
				disablePopup2();
				//change victory track
				if (eval('units.'+starting+'.castle')!=0) {
					$.get('php/minus_zamok.php',{house:house, victim:myhouse});
					if (document.getElementById(starting+'Port') != null) {
						$.get('php/leave_port.php',{table: terr, target:starting+'Port'});
					}
				}
				myInterval = setInterval("refresh();", 3000);
				return false;
			});
		} else {
			$.get('php/leave_token.php',{table: terr, mesto:starting, token:0, house:house, myhouse:myhouse});
			//change victory track
			if (eval('units.'+starting+'.castle')!=0) {
				$.get('php/minus_zamok.php',{house:house, victim:myhouse});
				if (document.getElementById(starting+'Port') != null) {
					$.get('php/leave_port.php',{table: terr, target:starting+'Port'});
				}
			}
			myInterval = setInterval("refresh();", 3000);
		}
	} else {
		$.get('php/remove_order.php',{table: terr, mesto:starting});
		myInterval = setInterval("refresh();", 3000);
	}
}

//capture port function
function captureport(targetport) {
	//if port have ships
	if (eval('units.'+targetport+'.unit1')!=0) {
		var ship = new Array( 0, 0, 0, 0);
		//units selection
		$("#popup2Content").html('<p>Click on ship to capture:</p>');
		var tempval = 'units.'+targetport+'.';
		placeunitport(tempval, 'popup2Content', mycontrol);
		$("#popup2Content").append('<div class="clearfix"></div><p>All not captured ships will be destroyed!</p><a class="button Select" href="#">OK</a>');
		$("#popup2Error").html('');
		//centering with css  
		centerPopup2();  
		//load popup  
		loadPopup2();
		
		//click on unit
		$("#popup2Content div.selectunit").click(function(){
			var nomer = $(this).html();
			nomer = nomer.replace(/unit/, '');
			
			if ($(this).hasClass('selected')) {
				$(this).removeClass('selected');
				ship[nomer-1] = 0;
			} else {
				$(this).addClass('selected');
				ship[nomer-1] = $(this).html();
			}
			
			return false;
		});
		
		//click on Select button
		$("#popup2Content a.Select").click(function(){
			ship.sort(compare);
			
			//make backup
			var portbackup = cloneObj(eval('units.'+targetport));
			
			
			//forming new units object
			eval('units.'+targetport+'.unit1 = 0');
			eval('units.'+targetport+'.unit2 = 0');
			eval('units.'+targetport+'.unit3 = 0');
			eval('units.'+targetport+'.unit4 = 0');
			if (ship[0] != 0) {
				eval('units.'+targetport+'.unit1 = "'+portbackup[ship[0]]+'"');
				if (ship[1] != 0) {
					eval('units.'+targetport+'.unit2 = "'+portbackup[ship[1]]+'"');
					if (ship[2] != 0) {
						eval('units.'+targetport+'.unit3 = "'+portbackup[ship[2]]+'"');
						if (ship[3] != 0) {
							eval('units.'+targetport+'.unit4 = "'+portbackup[ship[3]]+'"');
						}
					}
				}
			}
			eval('units.'+targetport+'.control = "'+mycontrol+'"');
			
			//check new limits
			if (supplylimit(mycontrol, myhouse)) {
				//objects on map setup
				$('#board .water').each(function() {
					$(this).html('');
					var tempval = 'units.'+$(this).attr("id")+'.';
					var house = eval('units.'+$(this).attr("id")+'.control');
					placeunit(tempval, $(this).attr("id"), house);
				});
				$.get('php/capture_port.php',{table: terr, target:targetport, unit1:ship[0], unit2:ship[1], unit3:ship[2], unit4:ship[3], control:mycontrol});
				disablePopup2();
				marchphaseend();
			} else {
				$("#popup2Error").html('<p>Not enough supply!</p>');
				eval('units.'+targetport+' = cloneObj(portbackup)');
				ship = [ 0, 0, 0, 0];
				$("#popup2Content div.selectunit").removeClass('selected');
			}
			return false;
			
		});
	} else {//empty port
		//change control
		$.get('php/control_port.php',{table: terr, target:targetport, control:mycontrol});
		marchphaseend();
	}
};

//capture port function #2
function captureport2(targetport) {
	//if port have ships
	if (eval('units.'+targetport+'.unit1')!=0) {
		var ship = new Array( 0, 0, 0, 0);
		//units selection
		$("#popup2Content").html('<p>Click on ship to capture:</p>');
		var tempval = 'units.'+targetport+'.';
		placeunitport(tempval, 'popup2Content', mycontrol);
		$("#popup2Content").append('<div class="clearfix"></div><p>All not captured ships will be destroyed!</p><a class="button Select" href="#">OK</a>');
		$("#popup2Error").html('');
		//centering with css  
		centerPopup2();  
		//load popup  
		loadPopup2();
		
		//click on unit
		$("#popup2Content div.selectunit").click(function(){
			var nomer = $(this).html();
			nomer = nomer.replace(/unit/, '');
			
			if ($(this).hasClass('selected')) {
				$(this).removeClass('selected');
				ship[nomer-1] = 0;
			} else {
				$(this).addClass('selected');
				ship[nomer-1] = $(this).html();
			}
			
			return false;
		});
		
		//click on Select button
		$("#popup2Content a.Select").click(function(){
			ship.sort(compare);
			
			//make backup
			var portbackup = cloneObj(eval('units.'+targetport));
			
			
			//forming new units object
			eval('units.'+targetport+'.unit1 = 0');
			eval('units.'+targetport+'.unit2 = 0');
			eval('units.'+targetport+'.unit3 = 0');
			eval('units.'+targetport+'.unit4 = 0');
			if (ship[0] != 0) {
				eval('units.'+targetport+'.unit1 = "'+portbackup[ship[0]]+'"');
				if (ship[1] != 0) {
					eval('units.'+targetport+'.unit2 = "'+portbackup[ship[1]]+'"');
					if (ship[2] != 0) {
						eval('units.'+targetport+'.unit3 = "'+portbackup[ship[2]]+'"');
						if (ship[3] != 0) {
							eval('units.'+targetport+'.unit4 = "'+portbackup[ship[3]]+'"');
						}
					}
				}
			}
			eval('units.'+targetport+'.control = "'+mycontrol+'"');
			
			//check new limits
			if (supplylimit(mycontrol, myhouse)) {
				//objects on map setup
				$('#board .water').each(function() {
					$(this).html('');
					var tempval = 'units.'+$(this).attr("id")+'.';
					var house = eval('units.'+$(this).attr("id")+'.control');
					placeunit(tempval, $(this).attr("id"), house);
				});
				$.get('php/capture_port.php',{table: terr, target:targetport, unit1:ship[0], unit2:ship[1], unit3:ship[2], unit4:ship[3], control:mycontrol});
				disablePopup2();
				marchphaseend2();
			} else {
				$("#popup2Error").html('<p>Not enough supply!</p>');
				eval('units.'+targetport+' = cloneObj(portbackup)');
				ship = [ 0, 0, 0, 0];
				$("#popup2Content div.selectunit").removeClass('selected');
			}
			return false;
			
		});
	} else {//empty port
		//change control
		$.get('php/control_port.php',{table: terr, target:targetport, control:mycontrol});
		marchphaseend2();
	}
};

//determine ship type
function detunitport(data, id, unit, house) {
	//ship
	if (eval(data+unit)=='S1') {
		$("#"+id).append('<div class="'+ house +'S1 ship selectunit">'+unit+'</div>');
	} else {
		//routed ship
		if (eval(data+unit)=='S0') {
			$("#"+id).append('<div class="'+ house +'S1 ship routed selectunit">'+unit+'</div>');
		} 
	}
}


//filling port with ships
function placeunitport(data, id, house) {
	//unit1
	if (eval(data+'unit1') !=0) {
		detunitport(data, id, 'unit1', house);
		//unit2
		if (eval(data+'unit2') !=0) {
			detunitport(data, id, 'unit2', house);
			//unit3
			if (eval(data+'unit3') !=0) {
				detunitport(data, id, 'unit3', house);
				//unit4
				if (eval(data+'unit4') !=0) {
					detunitport(data, id, 'unit4', house);
				}
			}
		}
	}
};					

//Retreat phase function for land units
function retreatphase(terrname) {
	if (starting == terrname) {
		$.get('php/retreat_no.php',{terr: terr, id: game_id, house:house});
		retreatphaseend();
	} else if (terrname != starting) {
		target = terrname;
		var attacker = new Array( 0, 0, 0, 0);
		//check if territory available
		if (eval('karta.'+starting+'.'+target) == 1 || eval('karta2.'+starting+'.'+target) == 4) {
			if (eval('units.'+target+'.unit4') == 0 && (eval('units.'+target+'.control') == mycontrol || eval('units.'+target+'.control') == 0)) { //target territory without enemy army and some space for new unit
				//select units from starting territory if there is army of 2 or more units
				if (battle.dunit2 !=0) {
					//units selection
					$("#popupContent").html('<p>Click on unit to select:</p>');
					var tempbattle = 'battle.d';
					placeunitcas(tempbattle, 'popupContent', mycontrol);
					$("#popupContent").append('<div class="clearfix"></div><a class="button Select" href="#">OK</a>');
					$("#popupError").html('');
					//centering with css  
					centerPopup();  
					//load popup  
					loadPopup();
					
					//check free space in target
					if (eval('units.'+target+'.unit1') ==0) {
						var freespace = 4;
					} else if (eval('units.'+target+'.unit2') ==0) {
						var freespace = 3;
					} else if (eval('units.'+target+'.unit3') ==0) {
						var freespace = 2;
					} else {
						var freespace = 1;
					}
					var moveunits = 0;
					//click on unit
					$("#popupContent div.selectunit").click(function(){
						var nomer = $(this).html();
						nomer = nomer.replace(/unit/, '');
						
						if ($(this).hasClass('selected')) {
							$(this).removeClass('selected');
							attacker[nomer-1] = 0;
							moveunits--;
						} else if (moveunits < freespace) {
							$(this).addClass('selected');
							attacker[nomer-1] = $(this).html();
							moveunits++;
						}
						
						return false;
					});
					
					//click on Select button
					$("#popupContent a.Select").click(function(){
						
						attacker.sort(compare);
						
						//make backup
						var targetbackup = cloneObj(eval('units.'+target));
						
						//forming new units object
						if (eval('units.'+target+'.unit1') == 0) {
							if (attacker[0] != 0) {
								eval('units.'+target+'.unit1 = battle.d'+attacker[0]);
								if (attacker[1] != 0) {
									eval('units.'+target+'.unit2 = battle.d'+attacker[1]);
									if (attacker[2] != 0) {
										eval('units.'+target+'.unit3 = battle.d'+attacker[2]);
										if (attacker[3] != 0) {
											eval('units.'+target+'.unit4 = battle.d'+attacker[3]);
										}
									}
								}
							}
						} else if (eval('units.'+target+'.unit2') == 0) {
							if (attacker[0] != 0) {
								eval('units.'+target+'.unit2 = battle.d'+attacker[0]);
								if (attacker[1] != 0) {
									eval('units.'+target+'.unit3 = battle.d'+attacker[1]);
									if (attacker[2] != 0) {
										eval('units.'+target+'.unit4 = battle.d'+attacker[2]);
									}
								}
							}
						} else if (eval('units.'+target+'.unit3') == 0) {
							if (attacker[0] != 0) {
								eval('units.'+target+'.unit3 = battle.d'+attacker[0]);
								if (attacker[1] != 0) {
									eval('units.'+target+'.unit4 = battle.d'+attacker[1]);
								}
							}
						} else {
							if (attacker[0] != 0) {
								eval('units.'+target+'.unit4 = battle.d'+attacker[0]);
							}
						}
						eval('units.'+target+'.control = "'+mycontrol+'"');
						
						//check new limits
						if (supplylimit(mycontrol, myhouse) && attacker[0] != 0) {
							disablePopup();
							
							$('#board .land').each(function() {
								$(this).html('');
								var tempval = 'units.'+$(this).attr("id")+'.';
								var house = eval('units.'+$(this).attr("id")+'.control');
								placeunit(tempval, $(this).attr("id"), house);
								placegar(tempval, $(this).attr("id"));
								placetoken(tempval, $(this).attr("id"), house);
							});
							
							for (j=0; j<4; j++) {
								if (attacker[j] != 0) {
									attacker[j] = 'd'+attacker[j];
								}
							}
							$.get('php/retreat_order.php',{terr: terr, id: game_id, target:target, unit1:attacker[0], unit2:attacker[1], unit3:attacker[2], unit4:attacker[3], house:house});
							//change victory track
							if (eval('units.'+target+'.castle')!=0 && eval('units.'+target+'.control') == 0) {
								$.get('php/plus_zamok.php',{house:house, victim:myhouse});
								//if territory with port
								if (document.getElementById(target+'Port') != null) {
									captureport3(target+'Port');
								} else {
									retreatphaseend();
								};
							} else {
								retreatphaseend();
							};
						} else {
							disablePopup();
							$("#popup3Content").html('<p>Not enough supply!</p><a id="popupOk" class="button">OK</a>');
							centerPopup3();
							loadPopup3();
							eval('units.'+target+' = cloneObj(targetbackup)');
						}
						return false;
					}); //end of select button
					
				} else { //if starting territory with single unit
					
					//make backup
					var targetbackup = cloneObj(eval('units.'+target));
					
					//forming new units object
					if (eval('units.'+target+'.unit1') == 0) {
						eval('units.'+target+'.unit1 = battle.dunit1');
					} else if (eval('units.'+target+'.unit2') == 0) {
						eval('units.'+target+'.unit2 = battle.dunit1');
					} else if (eval('units.'+target+'.unit3') == 0) {
						eval('units.'+target+'.unit3 = battle.dunit1');
					} else {
						eval('units.'+target+'.unit4 = battle.dunit1');
					}
					eval('units.'+target+'.control = "'+mycontrol+'"');
					
					//check new limits
					if (supplylimit(mycontrol, myhouse)) {
						
						$('#board .land').each(function() {
							$(this).html('');
							var tempval = 'units.'+$(this).attr("id")+'.';
							var house = eval('units.'+$(this).attr("id")+'.control');
							placeunit(tempval, $(this).attr("id"), house);
							placegar(tempval, $(this).attr("id"));
							placetoken(tempval, $(this).attr("id"), house);
						});
						$.get('php/retreat_order.php',{terr: terr, id: game_id, target:target, unit1:'dunit1', unit2:0, unit3:0, unit4:0, house:house});
						//change victory track
						if (eval('units.'+target+'.castle')!=0 && eval('units.'+target+'.control') == 0) {
							$.get('php/plus_zamok.php',{house:house, victim:myhouse});
							//if territory with port
							if (document.getElementById(target+'Port') != null) {
								captureport3(target+'Port');
							} else {
								retreatphaseend();
							};
						} else {
							retreatphaseend();
						};
					} else {
						$("#popup3Content").html('<p>Not enough supply!</p><a id="popupOk" class="button">OK</a>');
						centerPopup3();
						loadPopup3();
						eval('units.'+target+' = cloneObj(targetbackup)');
					}
				}//end of "if starting territory with single unit"
			}//end of "target territory without enemy army and some space for new unit"
		};
	}
};

//end of retreatphase function
function retreatphaseend() {
	starting = 0;
	currentplayer = 0;
	myInterval = setInterval("refresh();", 3000);
	disablePopup2();
};
//capture port function
function captureport3(targetport) {
	//change control
	$.get('php/control_port.php',{table: terr, target:targetport, control:mycontrol});
	retreatphaseend();
};

//Retreat phase function for water units
function retreatphase2(terrname) {
	if (starting == terrname) {
		$.get('php/retreat_no.php',{terr: terr, id: game_id, house:house});
		retreatphaseend();
	} else if (terrname != starting) {
		target = terrname;
		var attacker = new Array( 0, 0, 0, 0);
		//check if territory available
		if (eval('karta.'+starting+'.'+target) == 1) {
			if (eval('units.'+target+'.unit4') == 0 && (eval('units.'+target+'.control') == mycontrol || eval('units.'+target+'.control') == 0)) { //target territory without enemy army and some space for new unit
				//select units from starting territory if there is army of 2 or more units
				if (battle.dunit2 !=0) {
					//units selection
					$("#popupContent").html('<p>Click on unit to select:</p>');
					var tempbattle = 'battle.d';
					placeunitcas(tempbattle, 'popupContent', mycontrol);
					$("#popupContent").append('<div class="clearfix"></div><a class="button Select" href="#">OK</a>');
					$("#popupError").html('');
					//centering with css  
					centerPopup();  
					//load popup  
					loadPopup();
					
					//check free space in target
					if (eval('units.'+target+'.unit1') ==0) {
						var freespace = 4;
					} else if (eval('units.'+target+'.unit2') ==0) {
						var freespace = 3;
					} else if (eval('units.'+target+'.unit3') ==0) {
						var freespace = 2;
					} else {
						var freespace = 1;
					}
					var moveunits = 0;
					//click on unit
					$("#popupContent div.selectunit").click(function(){
						var nomer = $(this).html();
						nomer = nomer.replace(/unit/, '');
						
						if ($(this).hasClass('selected')) {
							$(this).removeClass('selected');
							attacker[nomer-1] = 0;
							moveunits--;
						} else if (moveunits < freespace) {
							$(this).addClass('selected');
							attacker[nomer-1] = $(this).html();
							moveunits++;
						}
						
						return false;
					});
					
					//click on Select button
					$("#popupContent a.Select").click(function(){
						
						attacker.sort(compare);
						
						//make backup
						var targetbackup = cloneObj(eval('units.'+target));
						
						//forming new units object
						if (eval('units.'+target+'.unit1') == 0) {
							if (attacker[0] != 0) {
								eval('units.'+target+'.unit1 = battle.d'+attacker[0]);
								if (attacker[1] != 0) {
									eval('units.'+target+'.unit2 = battle.d'+attacker[1]);
									if (attacker[2] != 0) {
										eval('units.'+target+'.unit3 = battle.d'+attacker[2]);
										if (attacker[3] != 0) {
											eval('units.'+target+'.unit4 = battle.d'+attacker[3]);
										}
									}
								}
							}
						} else if (eval('units.'+target+'.unit2') == 0) {
							if (attacker[0] != 0) {
								eval('units.'+target+'.unit2 = battle.d'+attacker[0]);
								if (attacker[1] != 0) {
									eval('units.'+target+'.unit3 = battle.d'+attacker[1]);
									if (attacker[2] != 0) {
										eval('units.'+target+'.unit4 = battle.d'+attacker[2]);
									}
								}
							}
						} else if (eval('units.'+target+'.unit3') == 0) {
							if (attacker[0] != 0) {
								eval('units.'+target+'.unit3 = battle.d'+attacker[0]);
								if (attacker[1] != 0) {
									eval('units.'+target+'.unit4 = battle.d'+attacker[1]);
								}
							}
						} else {
							if (attacker[0] != 0) {
								eval('units.'+target+'.unit4 = battle.d'+attacker[0]);
							}
						}
						eval('units.'+target+'.control = "'+mycontrol+'"');
						
						//check new limits
						if (supplylimit(mycontrol, myhouse) && attacker[0] != 0) {
							disablePopup();
							
							$('#board .water').each(function() {
								$(this).html('');
								var tempval = 'units.'+$(this).attr("id")+'.';
								var house = eval('units.'+$(this).attr("id")+'.control');
								placeunit(tempval, $(this).attr("id"), house);
							});
							
							for (j=0; j<4; j++) {
								if (attacker[j] != 0) {
									attacker[j] = 'd'+attacker[j];
								}
							}
							$.get('php/retreat_order.php',{terr: terr, id: game_id, target:target, unit1:attacker[0], unit2:attacker[1], unit3:attacker[2], unit4:attacker[3], house:house});
							starting = 0;
							currentplayer = 0;
							myInterval = setInterval("refresh();", 3000);
							disablePopup2();
							
						} else {
							disablePopup();
							$("#popup3Content").html('<p>Not enough supply!</p><a id="popupOk" class="button">OK</a>');
							centerPopup3();
							loadPopup3();
							eval('units.'+target+' = cloneObj(targetbackup)');
						}
						return false;
					}); //end of select button
					
				} else { //if starting territory with single unit
					
					//make backup
					var targetbackup = cloneObj(eval('units.'+target));
					
					//forming new units object
					if (eval('units.'+target+'.unit1') == 0) {
						eval('units.'+target+'.unit1 = battle.dunit1');
					} else if (eval('units.'+target+'.unit2') == 0) {
						eval('units.'+target+'.unit2 = battle.dunit1');
					} else if (eval('units.'+target+'.unit3') == 0) {
						eval('units.'+target+'.unit3 = battle.dunit1');
					} else {
						eval('units.'+target+'.unit4 = battle.dunit1');
					}
					eval('units.'+target+'.control = "'+mycontrol+'"');
					
					//check new limits
					if (supplylimit(mycontrol, myhouse)) {
						
						$('#board .water').each(function() {
							$(this).html('');
							var tempval = 'units.'+$(this).attr("id")+'.';
							var house = eval('units.'+$(this).attr("id")+'.control');
							placeunit(tempval, $(this).attr("id"), house);
						});
						$.get('php/retreat_order.php',{terr: terr, id: game_id, target:target, unit1:'dunit1', unit2:0, unit3:0, unit4:0, house:house});
						
						starting = 0;
						currentplayer = 0;
						myInterval = setInterval("refresh();", 3000);
						disablePopup2();
						
					} else {
						$("#popup3Content").html('<p>Not enough supply!</p><a id="popupOk" class="button">OK</a>');
						centerPopup3();
						loadPopup3();
						eval('units.'+target+' = cloneObj(targetbackup)');
					}
				}//end of "if starting territory with single unit"
			}//end of "target territory without enemy army and some space for new unit"
		};
	}
};

//Retreat phase function for land units if Robb is winner
function robbphase(terrname) {
	if (allowed.indexOf(terrname) != -1) {
		target = terrname;
		//if robb attacker
		if (battle.acard == 'Robb') {
			if (battle.defender == 'Baratheon') {
				var enemycontrol = 'B';
				var enemyhouse = 'Baratheon';
			} else if (battle.defender == 'Stark') {
				var enemycontrol = 'S';
				var enemyhouse = 'Stark';
			} else if (battle.defender == 'Greyjoy') {
				var enemycontrol = 'G';
				var enemyhouse = 'Greyjoy';
			} else if (battle.defender == 'Tyrell') {
				var enemycontrol = 'T';
				var enemyhouse = 'Tyrell';
			} else if (battle.defender == 'Lannister') {
				var enemycontrol = 'L';
				var enemyhouse = 'Lannister';
			} else if (battle.defender == 'Martell') {
				var enemycontrol = 'M';
				var enemyhouse = 'Martell';
			}
		} else
		//if robb defender
		if (battle.dcard == 'Robb') {
			if (battle.attacker == 'Baratheon') {
				var enemycontrol = 'B';
				var enemyhouse = 'Baratheon';
			} else if (battle.attacker == 'Stark') {
				var enemycontrol = 'S';
				var enemyhouse = 'Stark';
			} else if (battle.attacker == 'Greyjoy') {
				var enemycontrol = 'G';
				var enemyhouse = 'Greyjoy';
			} else if (battle.attacker == 'Tyrell') {
				var enemycontrol = 'T';
				var enemyhouse = 'Tyrell';
			} else if (battle.attacker == 'Lannister') {
				var enemycontrol = 'L';
				var enemyhouse = 'Lannister';
			} else if (battle.attacker == 'Martell') {
				var enemycontrol = 'M';
				var enemyhouse = 'Martell';
			}
		};
		
		$.get('php/retreat_robb.php',{terr: terr, id: game_id, target:target, unit1:retreater[0], unit2:retreater[1], unit3:retreater[2], unit4:retreater[3], house:house, control:enemycontrol});
		//change victory track
		if (eval('units.'+target+'.castle')!=0 && eval('units.'+target+'.control') == 0) {
			$.get('php/plus_zamok.php',{house:house, victim:enemyhouse});
			//if territory with port
			if (document.getElementById(target+'Port') != null) {
				//change control
				$.get('php/control_port.php',{table: terr, target:target+'Port', control:enemycontrol});
				retreatphaseend();
			} else {
				retreatphaseend();
			};
		} else {
			retreatphaseend();
		};
		
	}
};

//Retreat phase function for water units if Robb is winner
function robbphase2(terrname) {
	if (allowed.indexOf(terrname) != -1) {
		target = terrname;
		//if robb attacker
		if (battle.acard == 'Robb') {
			if (battle.defender == 'Baratheon') {
				var enemycontrol = 'B';
			} else if (battle.defender == 'Stark') {
				var enemycontrol = 'S';
			} else if (battle.defender == 'Greyjoy') {
				var enemycontrol = 'G';
			} else if (battle.defender == 'Tyrell') {
				var enemycontrol = 'T';
			} else if (battle.defender == 'Lannister') {
				var enemycontrol = 'L';
			} else if (battle.defender == 'Martell') {
				var enemycontrol = 'M';
			}
		} else
		//if robb defender
		if (battle.dcard == 'Robb') {
			if (battle.attacker == 'Baratheon') {
				var enemycontrol = 'B';
			} else if (battle.attacker == 'Stark') {
				var enemycontrol = 'S';
			} else if (battle.attacker == 'Greyjoy') {
				var enemycontrol = 'G';
			} else if (battle.attacker == 'Tyrell') {
				var enemycontrol = 'T';
			} else if (battle.attacker == 'Lannister') {
				var enemycontrol = 'L';
			} else if (battle.attacker == 'Martell') {
				var enemycontrol = 'M';
			}
		};
		
		$.get('php/retreat_robb.php',{terr: terr, id: game_id, target:target, unit1:retreater[0], unit2:retreater[1], unit3:retreater[2], unit4:retreater[3], house:house, control:enemycontrol});
		
		retreatphaseend();
	}
};

//Raid phase function for land units
function consolidatephase(terrname) {
	if ( eval('units.'+terrname+'.unit1') !=0 && eval('units.'+terrname+'.control') == mycontrol) {
		//simple consolidate power order
		if (eval('units.'+terrname+'.prikaz') == 6){
			$.get('php/consolidate_order.php',{terr: terr, id: game_id, target:terrname, house:house, myhouse:myhouse});
			currentplayer = 0;
		} else if (eval('units.'+terrname+'.prikaz') == 11){//special consolidate power order
			if (eval('units.'+terrname+'.castle') > 0) {
					
				clearInterval(myInterval);
				$("#popupContent").html('<h2>Initiate mustering or collect power tokens?</h2><a class="button mustering" href="#">Mustering</a><a class="button power" href="#">Collect power</a>');
				$("#popupError").html('');
				//centering with css  
				centerPopup();  
				//load popup  
				loadPopup();
				
				//click on Mustering
				$("#popupContent a.mustering").click(function(){
					disablePopup();
					consmustering(terrname);
					return false;
				});
				
				//click on Collect
				$("#popupContent a.power").click(function(){
					$.get('php/consolidate_order.php',{terr: terr, id: game_id, target:terrname, house:house, myhouse:myhouse});
					currentplayer = 0;
					disablePopup();
					myInterval = setInterval("refresh();", 3000);
					return false;
				});
			} else {//area without castle
				$.get('php/consolidate_order.php',{terr: terr, id: game_id, target:terrname, house:house, myhouse:myhouse});
				currentplayer = 0;
			};
		};
	};
};

//consolidate order mustering function
function consmustering(terrname) {
	var points = eval('units.'+terrname+'.castle');
	
	//footman in the area
	$("#popup2Content").html('<h4>Mustering points: '+points+'</h4><p>Click on footman to upgrade or on + to muster new unit:</p>');
	var tempval = 'units.'+terrname+'.';
	placeunitupgrade(tempval, 'popup2Content', mycontrol);
	
	//new unit
	$("#popup2Content").append('<div id="newunit">+</div><div class="clearfix"></div><a class="button Select" href="#">Done</a>');
	$("#popup2Error").html('');
	//centering with css
	centerPopup2();
	//load popup
	loadPopup2();
	
	//click on footnman
	$("#popup2Content div.selectunit").live('click', function(){
		$("#popup3Content").html('<a id="toKnight" class="button">Knight</a><a id="toEngine" class="button">Siege Engine</a>');
		centerPopup3();
		loadPopup3();
		
		//upgrade to Knight
		$("#toKnight").click(function(){
			//make backup
			var upgbackup = cloneObj(eval('units.'+terrname));
			
			//forming new units object
			if (eval('units.'+terrname+'.unit1') == 'F1' || eval('units.'+terrname+'.unit1') == 'F0') {
				eval('units.'+terrname+'.unit1 = "K1"');
				var targetunit = 'unit1';
			} else if (eval('units.'+terrname+'.unit2') == 'F1' || eval('units.'+terrname+'.unit2') == 'F0') {
				eval('units.'+terrname+'.unit2 = "K1"');
				var targetunit = 'unit2';
			} else if (eval('units.'+terrname+'.unit3') == 'F1' || eval('units.'+terrname+'.unit3') == 'F0') {
				eval('units.'+terrname+'.unit3 = "K1"');
				var targetunit = 'unit3';
			} else if (eval('units.'+terrname+'.unit4') == 'F1' || eval('units.'+terrname+'.unit4') == 'F0') {
				eval('units.'+terrname+'.unit4 = "K1"');
				var targetunit = 'unit4';
			};
			
			//check new limits
			if (supplylimit(mycontrol, myhouse)) {
				//objects on map setup
				$('#board .land').each(function() {
					$(this).html('');
					var tempval = 'units.'+$(this).attr("id")+'.';
					var house = eval('units.'+$(this).attr("id")+'.control');
					placeunit(tempval, $(this).attr("id"), house);
					placegar(tempval, $(this).attr("id"));
					placetoken(tempval, $(this).attr("id"), house);
				});
				$.get('php/upgrade_knight.php',{table: terr, target:terrname, targetunit:targetunit});
				$.get('php/player_ready.php',{table: house, myhouse: myhouse, id: game_id});
				disablePopup3();
				
				points--;
				if (points == 0) {
					currentplayer = 0;
					$.get('php/consolidate_next.php',{terr: terr, id: game_id, house: house, myhouse: myhouse});
					disablePopup2();
					myInterval = setInterval("refresh();", 3000);
				} else {
					//footman upgrade
					$("#popup2Content").html('<h4>Mustering points: '+points+'</h4><p>Click on footman to upgrade or on + to muster new unit:</p>');
					var tempval = 'units.'+terrname+'.';
					placeunitupgrade(tempval, 'popup2Content', mycontrol);
					
					//new unit
					$("#popup2Content").append('<div id="newunit">+</div><div class="clearfix"></div><a class="button Select" href="#">OK</a>');
					$("#popup2Error").html('');
					//centering with css
					centerPopup2();
				};
			} else {
				$("#popup2Error").html('<p>Not enough supply!</p>');
				eval('units.'+terrname+' = cloneObj(upgbackup)');
				disablePopup3();
			};
			return false;
		});
		//upgrade to Siege Engine
		$("#toEngine").click(function(){
			//make backup
			var upgbackup = cloneObj(eval('units.'+terrname));
			
			//forming new units object
			if (eval('units.'+terrname+'.unit1') == 'F1' || eval('units.'+terrname+'.unit1') == 'F0') {
				eval('units.'+terrname+'.unit1 = "E1"');
				var targetunit = 'unit1';
			} else if (eval('units.'+terrname+'.unit2') == 'F1' || eval('units.'+terrname+'.unit2') == 'F0') {
				eval('units.'+terrname+'.unit2 = "E1"');
				var targetunit = 'unit2';
			} else if (eval('units.'+terrname+'.unit3') == 'F1' || eval('units.'+terrname+'.unit3') == 'F0') {
				eval('units.'+terrname+'.unit3 = "E1"');
				var targetunit = 'unit3';
			} else if (eval('units.'+terrname+'.unit4') == 'F1' || eval('units.'+terrname+'.unit4') == 'F0') {
				eval('units.'+terrname+'.unit4 = "E1"');
				var targetunit = 'unit4';
			};
			
			//check new limits
			if (supplylimit(mycontrol, myhouse)) {
				//objects on map setup
				$('#board .land').each(function() {
					$(this).html('');
					var tempval = 'units.'+$(this).attr("id")+'.';
					var house = eval('units.'+$(this).attr("id")+'.control');
					placeunit(tempval, $(this).attr("id"), house);
					placegar(tempval, $(this).attr("id"));
					placetoken(tempval, $(this).attr("id"), house);
				});
				$.get('php/upgrade_engine.php',{table: terr, target:terrname, targetunit:targetunit});
				$.get('php/player_ready.php',{table: house, myhouse: myhouse, id: game_id});
				disablePopup3();
				
				points--;
				if (points == 0) {
					currentplayer = 0;
					$.get('php/consolidate_next.php',{terr: terr, id: game_id, house: house, myhouse: myhouse});
					disablePopup2();
					myInterval = setInterval("refresh();", 3000);
				} else {
					//footman upgrade
					$("#popup2Content").html('<h4>Mustering points: '+points+'</h4><p>Click on footman to upgrade or on + to muster new unit:</p>');
					var tempval = 'units.'+terrname+'.';
					placeunitupgrade(tempval, 'popup2Content', mycontrol);
					
					//new unit
					$("#popup2Content").append('<div id="newunit">+</div><div class="clearfix"></div><a class="button Select" href="#">OK</a>');
					$("#popup2Error").html('');
					//centering with css
					centerPopup2();
				};
			} else {
				$("#popup2Error").html('<p>Not enough supply!</p>');
				eval('units.'+terrname+' = cloneObj(upgbackup)');
				disablePopup3();
			};
			return false;
		});
		
		return false;
	});
	
	//click on +
	$("#newunit").live('click', function(){
		$("#popup3Content").html('<p>Click on unit to muster it:</p><div id="chooseupg"></div>');
		if (eval('units.'+terrname+'.unit4') == 0) {
			$("#chooseupg").append('<div class="'+ mycontrol +'F1 footman selectunit"></div>');
			if (points == 2) {
				$("#chooseupg").append('<div class="'+ mycontrol +'K1 knight selectunit"></div>');
				$("#chooseupg").append('<div class="'+ mycontrol +'E1 engine selectunit"></div>');
			};
		};
		
		//determine water areas
		var muswater = new Array();
		var i = 0;
		for (name in units) {
			var tempval = eval(units[name]);
			if ((tempval.control == mycontrol || tempval.control == 0) && tempval.unit4 == 0 && (eval('karta.'+terrname+'.'+name) == 2 || eval('karta.'+terrname+'.'+name) == 3)) {
				muswater[i] = name;
				i++;
			};
		};
		if (muswater[0] != undefined) {
			$("#chooseupg").append('<div class="'+ mycontrol +'S1 ship selectunit"></div>');
		}
		centerPopup3();
		loadPopup3();
		
		//muster Footman
		$("#chooseupg .footman").click(function(){
			//make backup
			var upgbackup = cloneObj(eval('units.'+terrname));
			
			//forming new units object
			if (eval('units.'+terrname+'.unit1') == 0) {
				eval('units.'+terrname+'.unit1 = "F1"');
				var targetunit = 'unit1';
			} else if (eval('units.'+terrname+'.unit2') == 0) {
				eval('units.'+terrname+'.unit2 = "F1"');
				var targetunit = 'unit2';
			} else if (eval('units.'+terrname+'.unit3') == 0) {
				eval('units.'+terrname+'.unit3 = "F1"');
				var targetunit = 'unit3';
			} else {
				eval('units.'+terrname+'.unit4 = "F1"');
				var targetunit = 'unit4';
			};
			
			//check new limits
			if (supplylimit(mycontrol, myhouse)) {
				//objects on map setup
				$('#board .land').each(function() {
					$(this).html('');
					var tempval = 'units.'+$(this).attr("id")+'.';
					var house = eval('units.'+$(this).attr("id")+'.control');
					placeunit(tempval, $(this).attr("id"), house);
					placegar(tempval, $(this).attr("id"));
					placetoken(tempval, $(this).attr("id"), house);
				});
				$.get('php/muster_fm.php',{table: terr, target:terrname, targetunit:targetunit});
				$.get('php/player_ready.php',{table: house, myhouse: myhouse, id: game_id});
				disablePopup3();
				
				points--;
				if (points == 0) {
					currentplayer = 0;
					$.get('php/consolidate_next.php',{terr: terr, id: game_id, house: house, myhouse: myhouse});
					disablePopup2();
					myInterval = setInterval("refresh();", 3000);
				} else {
					//footman upgrade
					$("#popup2Content").html('<h4>Mustering points: '+points+'</h4><p>Click on footman to upgrade or on + to muster new unit:</p>');
					var tempval = 'units.'+terrname+'.';
					placeunitupgrade(tempval, 'popup2Content', mycontrol);
					
					//new unit
					$("#popup2Content").append('<div id="newunit">+</div><div class="clearfix"></div><a class="button Select" href="#">OK</a>');
					$("#popup2Error").html('');
					//centering with css
					centerPopup2();
				};
			} else {
				$("#popup2Error").html('<p>Not enough supply!</p>');
				eval('units.'+terrname+' = cloneObj(upgbackup)');
				disablePopup3();
			};
			return false;
		});
		//muster Knight
		$("#chooseupg .knight").click(function(){
			//make backup
			var upgbackup = cloneObj(eval('units.'+terrname));
			
			//forming new units object
			if (eval('units.'+terrname+'.unit1') == 0) {
				eval('units.'+terrname+'.unit1 = "K1"');
				var targetunit = 'unit1';
			} else if (eval('units.'+terrname+'.unit2') == 0) {
				eval('units.'+terrname+'.unit2 = "K1"');
				var targetunit = 'unit2';
			} else if (eval('units.'+terrname+'.unit3') == 0) {
				eval('units.'+terrname+'.unit3 = "K1"');
				var targetunit = 'unit3';
			} else {
				eval('units.'+terrname+'.unit4 = "K1"');
				var targetunit = 'unit4';
			};
			
			//check new limits
			if (supplylimit(mycontrol, myhouse)) {
				//objects on map setup
				$('#board .land').each(function() {
					$(this).html('');
					var tempval = 'units.'+$(this).attr("id")+'.';
					var house = eval('units.'+$(this).attr("id")+'.control');
					placeunit(tempval, $(this).attr("id"), house);
					placegar(tempval, $(this).attr("id"));
					placetoken(tempval, $(this).attr("id"), house);
				});
				$.get('php/muster_kn.php',{table: terr, target:terrname, targetunit:targetunit});
				$.get('php/consolidate_next.php',{terr: terr, id: game_id, house: house, myhouse: myhouse});
				
				currentplayer = 0;
				disablePopup3();
				disablePopup2();
				myInterval = setInterval("refresh();", 3000);
			} else {
				$("#popup2Error").html('<p>Not enough supply!</p>');
				eval('units.'+terrname+' = cloneObj(upgbackup)');
				disablePopup3();
			};
			return false;
		});
		//muster Siege Engine
		$("#chooseupg .engine").click(function(){
			//make backup
			var upgbackup = cloneObj(eval('units.'+terrname));
			
			//forming new units object
			if (eval('units.'+terrname+'.unit1') == 0) {
				eval('units.'+terrname+'.unit1 = "E1"');
				var targetunit = 'unit1';
			} else if (eval('units.'+terrname+'.unit2') == 0) {
				eval('units.'+terrname+'.unit2 = "E1"');
				var targetunit = 'unit2';
			} else if (eval('units.'+terrname+'.unit3') == 0) {
				eval('units.'+terrname+'.unit3 = "E1"');
				var targetunit = 'unit3';
			} else {
				eval('units.'+terrname+'.unit4 = "E1"');
				var targetunit = 'unit4';
			};
			
			//check new limits
			if (supplylimit(mycontrol, myhouse)) {
				//objects on map setup
				$('#board .land').each(function() {
					$(this).html('');
					var tempval = 'units.'+$(this).attr("id")+'.';
					var house = eval('units.'+$(this).attr("id")+'.control');
					placeunit(tempval, $(this).attr("id"), house);
					placegar(tempval, $(this).attr("id"));
					placetoken(tempval, $(this).attr("id"), house);
				});
				$.get('php/muster_en.php',{table: terr, target:terrname, targetunit:targetunit});
				$.get('php/consolidate_next.php',{terr: terr, id: game_id, house: house, myhouse: myhouse});
				
				currentplayer = 0;
				disablePopup3();
				disablePopup2();
				myInterval = setInterval("refresh();", 3000);
			} else {
				$("#popup2Error").html('<p>Not enough supply!</p>');
				eval('units.'+terrname+' = cloneObj(upgbackup)');
				disablePopup3();
			};
			return false;
		});
		//muster Ship
		$("#chooseupg .ship").click(function(){
			//nearby water areas
			if (muswater[1] != undefined) {
				$("#popup3Content").html('<p>Where you want to muster ship:</p><div id="choosewater"></div>');
				for (i=0; i<muswater.length; i++) {
					$("#choosewater").append('<a class="button">'+muswater[i]+'</a>');
				};
				centerPopup3();
				//choose area
				$("#choosewater .button").click(function(){
					var tempwater = $(this).html();
					//make backup
					var upgbackup = cloneObj(eval('units.'+tempwater));
					
					//forming new units object
					if (eval('units.'+tempwater+'.unit1') == 0) {
						eval('units.'+tempwater+'.unit1 = "S1"');
						var targetunit = 'unit1';
					} else if (eval('units.'+tempwater+'.unit2') == 0) {
						eval('units.'+tempwater+'.unit2 = "S1"');
						var targetunit = 'unit2';
					} else if (eval('units.'+tempwater+'.unit3') == 0) {
						eval('units.'+tempwater+'.unit3 = "S1"');
						var targetunit = 'unit3';
					} else {
						eval('units.'+tempwater+'.unit4 = "S1"');
						var targetunit = 'unit4';
					};
					
					//check new limits
					if (supplylimit(mycontrol, myhouse)) {
						//objects on map setup
						$('#board .water').each(function() {
							$(this).html('');
							var tempval = 'units.'+$(this).attr("id")+'.';
							var house = eval('units.'+$(this).attr("id")+'.control');
							placeunit(tempval, $(this).attr("id"), house);
						});
						$.get('php/muster_sh.php',{table: terr, target:tempwater, targetunit:targetunit, control:mycontrol, starting:terrname});
						$.get('php/player_ready.php',{table: house, myhouse: myhouse, id: game_id});
						disablePopup3();
						
						points--;
						if (points == 0) {
							currentplayer = 0;
							$.get('php/consolidate_next.php',{terr: terr, id: game_id, house: house, myhouse: myhouse});
							disablePopup2();
							myInterval = setInterval("refresh();", 3000);
						} else {
							//footman upgrade
							$("#popup2Content").html('<h4>Mustering points: '+points+'</h4><p>Click on footman to upgrade or on + to muster new unit:</p>');
							var tempval = 'units.'+terrname+'.';
							placeunitupgrade(tempval, 'popup2Content', mycontrol);
							
							//new unit
							$("#popup2Content").append('<div id="newunit">+</div><div class="clearfix"></div><a class="button Select" href="#">OK</a>');
							$("#popup2Error").html('');
							//centering with css
							centerPopup2();
						};
					} else {
						$("#popup2Error").html('<p>Not enough supply!</p>');
						eval('units.'+tempwater+' = cloneObj(upgbackup)');
						disablePopup3();
					};
					return false;
				});
				
			} else {
				var tempwater = muswater[0];
				//make backup
				var upgbackup = cloneObj(eval('units.'+tempwater));
				
				//forming new units object
				if (eval('units.'+tempwater+'.unit1') == 0) {
					eval('units.'+tempwater+'.unit1 = "S1"');
					var targetunit = 'unit1';
				} else if (eval('units.'+tempwater+'.unit2') == 0) {
					eval('units.'+tempwater+'.unit2 = "S1"');
					var targetunit = 'unit2';
				} else if (eval('units.'+tempwater+'.unit3') == 0) {
					eval('units.'+tempwater+'.unit3 = "S1"');
					var targetunit = 'unit3';
				} else {
					eval('units.'+tempwater+'.unit4 = "S1"');
					var targetunit = 'unit4';
				};
				
				//check new limits
				if (supplylimit(mycontrol, myhouse)) {
					//objects on map setup
					$('#board .water').each(function() {
						$(this).html('');
						var tempval = 'units.'+$(this).attr("id")+'.';
						var house = eval('units.'+$(this).attr("id")+'.control');
						placeunit(tempval, $(this).attr("id"), house);
					});
					$.get('php/muster_sh.php',{table: terr, target:tempwater, targetunit:targetunit, control:mycontrol, starting:terrname});
					$.get('php/player_ready.php',{table: house, myhouse: myhouse, id: game_id});
					disablePopup3();
					
					points--;
					if (points == 0) {
						currentplayer = 0;
						$.get('php/consolidate_next.php',{terr: terr, id: game_id, house: house, myhouse: myhouse});
						disablePopup2();
						myInterval = setInterval("refresh();", 3000);
					} else {
						//footman upgrade
						$("#popup2Content").html('<h4>Mustering points: '+points+'</h4><p>Click on footman to upgrade or on + to muster new unit:</p>');
						var tempval = 'units.'+terrname+'.';
						placeunitupgrade(tempval, 'popup2Content', mycontrol);
						
						//new unit
						$("#popup2Content").append('<div id="newunit">+</div><div class="clearfix"></div><a class="button Select" href="#">OK</a>');
						$("#popup2Error").html('');
						//centering with css
						centerPopup2();
					};
				} else {
					$("#popup2Error").html('<p>Not enough supply!</p>');
					eval('units.'+tempwater+' = cloneObj(upgbackup)');
					disablePopup3();
				};
			};
			return false;
		});
		
		return false;
	});
	
	//click on Select button
	$("#popup2Content a.Select").live('click', function(){
		currentplayer = 0;
		$.get('php/remove_order.php',{table: terr, mesto:terrname});
		$.get('php/consolidate_next.php',{terr: terr, id: game_id, house: house, myhouse: myhouse});
		disablePopup2();
		myInterval = setInterval("refresh();", 3000);
		return false;
	});
};

//fill upgradable footmans
function placeunitupgrade(data, id, house) {
	//unit1
	if (eval(data+'unit1') == 'F1' || eval(data+'unit1') == 'F0') {
		$("#"+id).append('<div class="'+ house +'F1 footman selectunit"></div>');
	};
	//unit2
	if (eval(data+'unit2') == 'F1' || eval(data+'unit2') == 'F0') {
		$("#"+id).append('<div class="'+ house +'F1 footman selectunit"></div>');
	};
	//unit3
	if (eval(data+'unit3') == 'F1' || eval(data+'unit3') == 'F0') {
		$("#"+id).append('<div class="'+ house +'F1 footman selectunit"></div>');
	};
	//unit4
	if (eval(data+'unit4') == 'F1' || eval(data+'unit4') == 'F0') {
		$("#"+id).append('<div class="'+ house +'F1 footman selectunit"></div>');
	};
};

//Raid phase function for water units
function consolidatephase2(terrname) {
	if ( eval('units.'+terrname+'.unit1') !=0 && eval('units.'+terrname+'.control') == mycontrol) {
		//simple consolidate power order
		if (eval('units.'+terrname+'.prikaz') == 6 || eval('units.'+terrname+'.prikaz') == 11){
			if (terrname == 'WinterfellPort' && (units.BayofIce.control == mycontrol || units.BayofIce.control == 0)) {
				$.get('php/consolidate_order.php',{terr: terr, id: game_id, target:terrname, house:house, myhouse:myhouse});
				currentplayer = 0;
			} else if (terrname == 'WhiteHarborPort' && (units.NarrowSea.control == mycontrol || units.NarrowSea.control == 0)) {
				$.get('php/consolidate_order.php',{terr: terr, id: game_id, target:terrname, house:house, myhouse:myhouse});
				currentplayer = 0;
			} else if (terrname == 'PykePort' && (units.IronmansBay.control == mycontrol || units.IronmansBay.control == 0)) {
				$.get('php/consolidate_order.php',{terr: terr, id: game_id, target:terrname, house:house, myhouse:myhouse});
				currentplayer = 0;
			} else if (terrname == 'LannisportPort' && (units.GoldenSound.control == mycontrol || units.GoldenSound.control == 0)) {
				$.get('php/consolidate_order.php',{terr: terr, id: game_id, target:terrname, house:house, myhouse:myhouse});
				currentplayer = 0;
			} else if (terrname == 'DragonstonePort' && (units.ShipbreakerBay.control == mycontrol || units.ShipbreakerBay.control == 0)) {
				$.get('php/consolidate_order.php',{terr: terr, id: game_id, target:terrname, house:house, myhouse:myhouse});
				currentplayer = 0;
			} else if (terrname == 'StormsEndPort' && (units.ShipbreakerBay.control == mycontrol || units.ShipbreakerBay.control == 0)) {
				$.get('php/consolidate_order.php',{terr: terr, id: game_id, target:terrname, house:house, myhouse:myhouse});
				currentplayer = 0;
			} else if (terrname == 'OldtownPort' && (units.RedwyneStraghts.control == mycontrol || units.RedwyneStraghts.control == 0)) {
				$.get('php/consolidate_order.php',{terr: terr, id: game_id, target:terrname, house:house, myhouse:myhouse});
				currentplayer = 0;
			} else if (terrname == 'SunspearPort' && (units.EastSummerSea.control == mycontrol || units.EastSummerSea.control == 0)) {
				$.get('php/consolidate_order.php',{terr: terr, id: game_id, target:terrname, house:house, myhouse:myhouse});
				currentplayer = 0;
			} else {
				$.get('php/remove_order.php',{table: terr, mesto:terrname});
				$.get('php/consolidate_next.php',{terr: terr, id: game_id, house: house, myhouse: myhouse});
				currentplayer = 0;
			};
		};
	};
};

//Mustering function
function mustering(terrname) {
	if ( eval('units.'+terrname+'.castle') >0 && eval('units.'+terrname+'.control') == mycontrol && (eval('units.'+terrname+'.castle') - eval('units.'+terrname+'.mustered')) > 0) {
		var points = (eval('units.'+terrname+'.castle') - eval('units.'+terrname+'.mustered'));
		
		//footman in the area
		$("#popup2Content").html('<h4>Mustering points: '+points+'</h4><p>Click on footman to upgrade or on + to muster new unit:</p>');
		var tempval = 'units.'+terrname+'.';
		placeunitupgrade(tempval, 'popup2Content', mycontrol);
		
		//new unit
		$("#popup2Content").append('<div id="newunit">+</div><div class="clearfix"></div><a class="button Select" href="#">Done</a>');
		$("#popup2Error").html('');
		//centering with css
		centerPopup2();
		//load popup
		loadPopup2();
		
		//click on footman
		$("#popup2Content div.selectunit").live('click', function(){
			$("#popup3Content").html('<a id="toKnight" class="button">Knight</a><a id="toEngine" class="button">Siege Engine</a>');
			centerPopup3();
			loadPopup3();
			
			//upgrade to Knight
			$("#toKnight").click(function(){
				//make backup
				var upgbackup = cloneObj(eval('units.'+terrname));
				
				//forming new units object
				if (eval('units.'+terrname+'.unit1') == 'F1') {
					eval('units.'+terrname+'.unit1 = "K1"');
					var targetunit = 'unit1';
				} else if (eval('units.'+terrname+'.unit2') == 'F1') {
					eval('units.'+terrname+'.unit2 = "K1"');
					var targetunit = 'unit2';
				} else if (eval('units.'+terrname+'.unit3') == 'F1') {
					eval('units.'+terrname+'.unit3 = "K1"');
					var targetunit = 'unit3';
				} else if (eval('units.'+terrname+'.unit4') == 'F1') {
					eval('units.'+terrname+'.unit4 = "K1"');
					var targetunit = 'unit4';
				};
				
				//check new limits
				if (supplylimit(mycontrol, myhouse)) {
					//objects on map setup
					$('#board .land').each(function() {
						$(this).html('');
						var tempval = 'units.'+$(this).attr("id")+'.';
						var house = eval('units.'+$(this).attr("id")+'.control');
						placeunit(tempval, $(this).attr("id"), house);
						placegar(tempval, $(this).attr("id"));
						placetoken(tempval, $(this).attr("id"), house);
					});
					$.get('php/upgrade_knight2.php',{table: terr, target:terrname, targetunit:targetunit});
					disablePopup3();
					
					eval('units.'+terrname+'.mustered += 1');
					
					points--;
					if (points == 0) {
						disablePopup2();
					} else {
						//footman upgrade
						$("#popup2Content").html('<h4>Mustering points: '+points+'</h4><p>Click on footman to upgrade or on + to muster new unit:</p>');
						var tempval = 'units.'+terrname+'.';
						placeunitupgrade(tempval, 'popup2Content', mycontrol);
						
						//new unit
						$("#popup2Content").append('<div id="newunit">+</div><div class="clearfix"></div><a class="button Select" href="#">OK</a>');
						$("#popup2Error").html('');
						//centering with css
						centerPopup2();
					};
				} else {
					$("#popup2Error").html('<p>Not enough supply!</p>');
					eval('units.'+terrname+' = cloneObj(upgbackup)');
					disablePopup3();
				};
				return false;
			});
			//upgrade to Siege Engine
			$("#toEngine").click(function(){
				//make backup
				var upgbackup = cloneObj(eval('units.'+terrname));
				
				//forming new units object
				if (eval('units.'+terrname+'.unit1') == 'F1') {
					eval('units.'+terrname+'.unit1 = "E1"');
					var targetunit = 'unit1';
				} else if (eval('units.'+terrname+'.unit2') == 'F1') {
					eval('units.'+terrname+'.unit2 = "E1"');
					var targetunit = 'unit2';
				} else if (eval('units.'+terrname+'.unit3') == 'F1') {
					eval('units.'+terrname+'.unit3 = "E1"');
					var targetunit = 'unit3';
				} else if (eval('units.'+terrname+'.unit4') == 'F1') {
					eval('units.'+terrname+'.unit4 = "E1"');
					var targetunit = 'unit4';
				};
				
				//check new limits
				if (supplylimit(mycontrol, myhouse)) {
					//objects on map setup
					$('#board .land').each(function() {
						$(this).html('');
						var tempval = 'units.'+$(this).attr("id")+'.';
						var house = eval('units.'+$(this).attr("id")+'.control');
						placeunit(tempval, $(this).attr("id"), house);
						placegar(tempval, $(this).attr("id"));
						placetoken(tempval, $(this).attr("id"), house);
					});
					$.get('php/upgrade_engine2.php',{table: terr, target:terrname, targetunit:targetunit});
					disablePopup3();
					
					eval('units.'+terrname+'.mustered += 1');
					
					points--;
					if (points == 0) {
						disablePopup2();
					} else {
						//footman upgrade
						$("#popup2Content").html('<h4>Mustering points: '+points+'</h4><p>Click on footman to upgrade or on + to muster new unit:</p>');
						var tempval = 'units.'+terrname+'.';
						placeunitupgrade(tempval, 'popup2Content', mycontrol);
						
						//new unit
						$("#popup2Content").append('<div id="newunit">+</div><div class="clearfix"></div><a class="button Select" href="#">OK</a>');
						$("#popup2Error").html('');
						//centering with css
						centerPopup2();
					};
				} else {
					$("#popup2Error").html('<p>Not enough supply!</p>');
					eval('units.'+terrname+' = cloneObj(upgbackup)');
					disablePopup3();
				};
				return false;
			});
			
			return false;
		});
		
		//click on +
		$("#newunit").live('click', function(){
			$("#popup3Content").html('<p>Click on unit to muster it:</p><div id="chooseupg"></div>');
			if (eval('units.'+terrname+'.unit4') == 0) {
				$("#chooseupg").append('<div class="'+ mycontrol +'F1 footman selectunit"></div>');
				if (points == 2) {
					$("#chooseupg").append('<div class="'+ mycontrol +'K1 knight selectunit"></div>');
					$("#chooseupg").append('<div class="'+ mycontrol +'E1 engine selectunit"></div>');
				};
			};
			
			//determine water areas
			var muswater = new Array();
			var i = 0;
			for (name in units) {
				var tempval = eval(units[name]);
				if ((tempval.control == mycontrol || tempval.control == 0) && tempval.unit4 == 0 && (eval('karta.'+terrname+'.'+name) == 2 || eval('karta.'+terrname+'.'+name) == 3)) {
					muswater[i] = name;
					i++;
				};
			};
			if (muswater[0] != undefined) {
				$("#chooseupg").append('<div class="'+ mycontrol +'S1 ship selectunit"></div>');
			}
			centerPopup3();
			loadPopup3();
			
			//muster Footman
			$("#chooseupg .footman").click(function(){
				//make backup
				var upgbackup = cloneObj(eval('units.'+terrname));
				
				//forming new units object
				if (eval('units.'+terrname+'.unit1') == 0) {
					eval('units.'+terrname+'.unit1 = "F1"');
					var targetunit = 'unit1';
				} else if (eval('units.'+terrname+'.unit2') == 0) {
					eval('units.'+terrname+'.unit2 = "F1"');
					var targetunit = 'unit2';
				} else if (eval('units.'+terrname+'.unit3') == 0) {
					eval('units.'+terrname+'.unit3 = "F1"');
					var targetunit = 'unit3';
				} else {
					eval('units.'+terrname+'.unit4 = "F1"');
					var targetunit = 'unit4';
				};
				
				//check new limits
				if (supplylimit(mycontrol, myhouse)) {
					//objects on map setup
					$('#board .land').each(function() {
						$(this).html('');
						var tempval = 'units.'+$(this).attr("id")+'.';
						var house = eval('units.'+$(this).attr("id")+'.control');
						placeunit(tempval, $(this).attr("id"), house);
						placegar(tempval, $(this).attr("id"));
						placetoken(tempval, $(this).attr("id"), house);
					});
					$.get('php/muster_fm2.php',{table: terr, target:terrname, targetunit:targetunit});
					disablePopup3();
					
					eval('units.'+terrname+'.mustered += 1');
					
					points--;
					if (points == 0) {
						disablePopup2();
					} else {
						//footman upgrade
						$("#popup2Content").html('<h4>Mustering points: '+points+'</h4><p>Click on footman to upgrade or on + to muster new unit:</p>');
						var tempval = 'units.'+terrname+'.';
						placeunitupgrade(tempval, 'popup2Content', mycontrol);
						
						//new unit
						$("#popup2Content").append('<div id="newunit">+</div><div class="clearfix"></div><a class="button Select" href="#">OK</a>');
						$("#popup2Error").html('');
						//centering with css
						centerPopup2();
					};
				} else {
					$("#popup2Error").html('<p>Not enough supply!</p>');
					eval('units.'+terrname+' = cloneObj(upgbackup)');
					disablePopup3();
				};
				return false;
			});
			//muster Knight
			$("#chooseupg .knight").click(function(){
				//make backup
				var upgbackup = cloneObj(eval('units.'+terrname));
				
				//forming new units object
				if (eval('units.'+terrname+'.unit1') == 0) {
					eval('units.'+terrname+'.unit1 = "K1"');
					var targetunit = 'unit1';
				} else if (eval('units.'+terrname+'.unit2') == 0) {
					eval('units.'+terrname+'.unit2 = "K1"');
					var targetunit = 'unit2';
				} else if (eval('units.'+terrname+'.unit3') == 0) {
					eval('units.'+terrname+'.unit3 = "K1"');
					var targetunit = 'unit3';
				} else {
					eval('units.'+terrname+'.unit4 = "K1"');
					var targetunit = 'unit4';
				};
				
				//check new limits
				if (supplylimit(mycontrol, myhouse)) {
					//objects on map setup
					$('#board .land').each(function() {
						$(this).html('');
						var tempval = 'units.'+$(this).attr("id")+'.';
						var house = eval('units.'+$(this).attr("id")+'.control');
						placeunit(tempval, $(this).attr("id"), house);
						placegar(tempval, $(this).attr("id"));
						placetoken(tempval, $(this).attr("id"), house);
					});
					$.get('php/muster_kn2.php',{table: terr, target:terrname, targetunit:targetunit});
					
					eval('units.'+terrname+'.mustered += 2');
					
					disablePopup3();
					disablePopup2();
				} else {
					$("#popup2Error").html('<p>Not enough supply!</p>');
					eval('units.'+terrname+' = cloneObj(upgbackup)');
					disablePopup3();
				};
				return false;
			});
			//muster Siege Engine
			$("#chooseupg .engine").click(function(){
				//make backup
				var upgbackup = cloneObj(eval('units.'+terrname));
				
				//forming new units object
				if (eval('units.'+terrname+'.unit1') == 0) {
					eval('units.'+terrname+'.unit1 = "E1"');
					var targetunit = 'unit1';
				} else if (eval('units.'+terrname+'.unit2') == 0) {
					eval('units.'+terrname+'.unit2 = "E1"');
					var targetunit = 'unit2';
				} else if (eval('units.'+terrname+'.unit3') == 0) {
					eval('units.'+terrname+'.unit3 = "E1"');
					var targetunit = 'unit3';
				} else {
					eval('units.'+terrname+'.unit4 = "E1"');
					var targetunit = 'unit4';
				};
				
				//check new limits
				if (supplylimit(mycontrol, myhouse)) {
					//objects on map setup
					$('#board .land').each(function() {
						$(this).html('');
						var tempval = 'units.'+$(this).attr("id")+'.';
						var house = eval('units.'+$(this).attr("id")+'.control');
						placeunit(tempval, $(this).attr("id"), house);
						placegar(tempval, $(this).attr("id"));
						placetoken(tempval, $(this).attr("id"), house);
					});
					$.get('php/muster_en2.php',{table: terr, target:terrname, targetunit:targetunit});
					
					eval('units.'+terrname+'.mustered += 2');
					
					disablePopup3();
					disablePopup2();
				} else {
					$("#popup2Error").html('<p>Not enough supply!</p>');
					eval('units.'+terrname+' = cloneObj(upgbackup)');
					disablePopup3();
				};
				return false;
			});
			//muster Ship
			$("#chooseupg .ship").click(function(){
				//nearby water areas
				if (muswater[1] != undefined) {
					$("#popup3Content").html('<p>Where you want to muster ship:</p><div id="choosewater"></div>');
					for (i=0; i<muswater.length; i++) {
						$("#choosewater").append('<a class="button">'+muswater[i]+'</a>');
					};
					centerPopup3();
					//choose area
					$("#choosewater .button").click(function(){
						var tempwater = $(this).html();
						//make backup
						var upgbackup = cloneObj(eval('units.'+tempwater));
						
						//forming new units object
						if (eval('units.'+tempwater+'.unit1') == 0) {
							eval('units.'+tempwater+'.unit1 = "S1"');
							var targetunit = 'unit1';
						} else if (eval('units.'+tempwater+'.unit2') == 0) {
							eval('units.'+tempwater+'.unit2 = "S1"');
							var targetunit = 'unit2';
						} else if (eval('units.'+tempwater+'.unit3') == 0) {
							eval('units.'+tempwater+'.unit3 = "S1"');
							var targetunit = 'unit3';
						} else {
							eval('units.'+tempwater+'.unit4 = "S1"');
							var targetunit = 'unit4';
						};
						
						//check new limits
						if (supplylimit(mycontrol, myhouse)) {
							//objects on map setup
							$('#board .water').each(function() {
								$(this).html('');
								var tempval = 'units.'+$(this).attr("id")+'.';
								var house = eval('units.'+$(this).attr("id")+'.control');
								placeunit(tempval, $(this).attr("id"), house);
							});
							$.get('php/muster_sh2.php',{table: terr, target:tempwater, targetunit:targetunit, control:mycontrol, starting:terrname});
							disablePopup3();
							
							eval('units.'+terrname+'.mustered += 1');
							
							points--;
							if (points == 0) {
								disablePopup2();
							} else {
								//footman upgrade
								$("#popup2Content").html('<h4>Mustering points: '+points+'</h4><p>Click on footman to upgrade or on + to muster new unit:</p>');
								var tempval = 'units.'+terrname+'.';
								placeunitupgrade(tempval, 'popup2Content', mycontrol);
								
								//new unit
								$("#popup2Content").append('<div id="newunit">+</div><div class="clearfix"></div><a class="button Select" href="#">OK</a>');
								$("#popup2Error").html('');
								//centering with css
								centerPopup2();
							};
						} else {
							$("#popup2Error").html('<p>Not enough supply!</p>');
							eval('units.'+tempwater+' = cloneObj(upgbackup)');
							disablePopup3();
						};
						return false;
					});
					
				} else {
					var tempwater = muswater[0];
					//make backup
					var upgbackup = cloneObj(eval('units.'+tempwater));
					
					//forming new units object
					if (eval('units.'+tempwater+'.unit1') == 0) {
						eval('units.'+tempwater+'.unit1 = "S1"');
						var targetunit = 'unit1';
					} else if (eval('units.'+tempwater+'.unit2') == 0) {
						eval('units.'+tempwater+'.unit2 = "S1"');
						var targetunit = 'unit2';
					} else if (eval('units.'+tempwater+'.unit3') == 0) {
						eval('units.'+tempwater+'.unit3 = "S1"');
						var targetunit = 'unit3';
					} else {
						eval('units.'+tempwater+'.unit4 = "S1"');
						var targetunit = 'unit4';
					};
					
					//check new limits
					if (supplylimit(mycontrol, myhouse)) {
						//objects on map setup
						$('#board .water').each(function() {
							$(this).html('');
							var tempval = 'units.'+$(this).attr("id")+'.';
							var house = eval('units.'+$(this).attr("id")+'.control');
							placeunit(tempval, $(this).attr("id"), house);
						});
						$.get('php/muster_sh2.php',{table: terr, target:tempwater, targetunit:targetunit, control:mycontrol, starting:terrname});
						disablePopup3();
						
						eval('units.'+terrname+'.mustered += 1');
						
						points--;
						if (points == 0) {
							disablePopup2();
						} else {
							//footman upgrade
							$("#popup2Content").html('<h4>Mustering points: '+points+'</h4><p>Click on footman to upgrade or on + to muster new unit:</p>');
							var tempval = 'units.'+terrname+'.';
							placeunitupgrade(tempval, 'popup2Content', mycontrol);
							
							//new unit
							$("#popup2Content").append('<div id="newunit">+</div><div class="clearfix"></div><a class="button Select" href="#">OK</a>');
							$("#popup2Error").html('');
							//centering with css
							centerPopup2();
						};
					} else {
						$("#popup2Error").html('<p>Not enough supply!</p>');
						eval('units.'+tempwater+' = cloneObj(upgbackup)');
						disablePopup3();
					};
				};
				return false;
			});
			
			return false;
		});
		
		//click on Select button
		$("#popup2Content a.Select").live('click', function(){
			disablePopup2();
			return false;
		});

	};
};

//Remove units till Supply WC function
function supply(terrname) {
    if (eval('units.'+terrname+'.control') == mycontrol && eval('units.'+terrname+'.unit2') != 0 && eval('houses.'+myhouse+'.ready') == 0) {
        //units selection
        $("#popupContent").html('<p>Click on unit to remove it:</p>');
        var tempval = 'units.'+terrname+'.';
        placeunitsup(tempval, 'popupContent', mycontrol);
        $("#popupError").html('');
        //centering with css
        centerPopup();
        //load popup
        loadPopup();

        //click on unit
        $("#popupContent div.selectunit").click(function(){
            var nomer = $(this).html();
            $.getJSON('php/remove_unit.php',{terr: terr, target:terrname, targetunit:nomer, house:house}, function(json) {
                eval('units.'+terrname+'.unit1 = "'+json.unit1+'"');
                eval('units.'+terrname+'.unit2 = "'+json.unit2+'"');
                eval('units.'+terrname+'.unit3 = "'+json.unit3+'"');
                eval('units.'+terrname+'.unit4 = "'+json.unit4+'"');

                $('#'+terrname).html('');
                var tempval = 'units.'+terrname+'.';
                placeunit(tempval, terrname, mycontrol);
                if ($('#'+terrname).hasClass('land')) {
                    placegar(tempval, terrname);
                };

            });
            disablePopup();
            return false;
        });

    };
};

//filling zone with units and orders
function placeunitsup(data, id, house) {
    //unit1
    if (eval(data+'unit1') !=0) {
        detunitsup(data, id, 'unit1', house);
        //unit2
        if (eval(data+'unit2') !=0) {
            detunitsup(data, id, 'unit2', house);
            //unit3
            if (eval(data+'unit3') !=0) {
                detunitsup(data, id, 'unit3', house);
                //unit4
                if (eval(data+'unit4') !=0) {
                    detunitsup(data, id, 'unit4', house);
                }
            }
        }
    }
};

//determine unit
function detunitsup(data, id, unit, house) {
    //footman
    if (eval(data+unit)=='F1') {
        $("#"+id).append('<div class="'+ house +'F1 footman selectunit">'+unit+'</div>');
    } else {
        //knight
        if (eval(data+unit)=='K1') {
            $("#"+id).append('<div class="'+ house +'K1 knight selectunit">'+unit+'</div>');
        } else {
            //engine
            if (eval(data+unit)=='E1') {
                $("#"+id).append('<div class="'+ house +'E1 engine selectunit">'+unit+'</div>');
            } else {
                //ship
                if (eval(data+unit)=='S1') {
                    $("#"+id).append('<div class="'+ house +'S1 ship selectunit">'+unit+'</div>');
                }
            }
        }
    }
};

//Crowkillers highest bidder function
function crowkillers(terrname) {
    if ( eval('units.'+terrname+'.control') == mycontrol && (eval('units.'+terrname+'.unit1') == 'F1' || eval('units.'+terrname+'.unit2') == 'F1' || eval('units.'+terrname+'.unit3') == 'F1' || eval('units.'+terrname+'.unit4') == 'F1') && eval('houses.'+myhouse+'.ready') < 2 ) {
        //upgrade to Knight

        //make backup
        var upgbackup = cloneObj(eval('units.'+terrname));

        //forming new units object
        if (eval('units.'+terrname+'.unit1') == 'F1') {
            eval('units.'+terrname+'.unit1 = "K1"');
            var targetunit = 'unit1';
        } else if (eval('units.'+terrname+'.unit2') == 'F1') {
            eval('units.'+terrname+'.unit2 = "K1"');
            var targetunit = 'unit2';
        } else if (eval('units.'+terrname+'.unit3') == 'F1') {
            eval('units.'+terrname+'.unit3 = "K1"');
            var targetunit = 'unit3';
        } else if (eval('units.'+terrname+'.unit4') == 'F1') {
            eval('units.'+terrname+'.unit4 = "K1"');
            var targetunit = 'unit4';
        };

        //check new limits
        if (supplylimit(mycontrol, myhouse)) {
            //objects on map setup
            $('#board .land').each(function() {
                $(this).html('');
                var tempval = 'units.'+$(this).attr("id")+'.';
                var house = eval('units.'+$(this).attr("id")+'.control');
                placeunit(tempval, $(this).attr("id"), house);
                placegar(tempval, $(this).attr("id"));
                placetoken(tempval, $(this).attr("id"), house);
            });
            $.get('php/upgrade_knight3.php',{table: terr, target:terrname, targetunit:targetunit});

            eval('houses.'+myhouse+'.ready++');

            if (eval('houses.'+myhouse+'.ready') == 2) {
                disablePopup();
                disablePopup2();
                disableReady();
                $.get('php/crowkillers_end.php',{house: house, myhouse: myhouse, id: game_id});
                myInterval = setInterval("refresh();", 3000);
            } else {
                $.get('php/player_ready.php',{table: house, myhouse: myhouse, id: game_id});
            };
        } else {
            $("#popup2Error").html('<p>Not enough supply!</p>');
            eval('units.'+terrname+' = cloneObj(upgbackup)');
        };
    };
};

//Crowkillers lowest bidder function
function crowkillers2(terrname) {
    if ( eval('units.'+terrname+'.control') == mycontrol && (eval('units.'+terrname+'.unit1') == 'K1' || eval('units.'+terrname+'.unit2') == 'K1' || eval('units.'+terrname+'.unit3') == 'K1' || eval('units.'+terrname+'.unit4') == 'K1') && eval('houses.'+myhouse+'.ready') == 1 ) {
        //search for Knight
        if (eval('units.'+terrname+'.unit1') == 'K1') {
            var targetunit = 'unit1';
        } else if (eval('units.'+terrname+'.unit2') == 'K1') {
            var targetunit = 'unit2';
        } else if (eval('units.'+terrname+'.unit3') == 'K1') {
            var targetunit = 'unit3';
        } else if (eval('units.'+terrname+'.unit4') == 'K1') {
            var targetunit = 'unit4';
        };
        //remove Knight
        $.getJSON('php/remove_unit.php',{terr: terr, target:terrname, targetunit:targetunit, house:house}, function(json) {
            eval('units.'+terrname+'.unit1 = "'+json.unit1+'"');
            eval('units.'+terrname+'.unit2 = "'+json.unit2+'"');
            eval('units.'+terrname+'.unit3 = "'+json.unit3+'"');
            eval('units.'+terrname+'.unit4 = "'+json.unit4+'"');

            $('#'+terrname).html('');
            var tempval = 'units.'+terrname+'.';
            placeunit(tempval, terrname, mycontrol);
            if ($('#'+terrname).hasClass('land')) {
                placegar(tempval, terrname);
            };

        });

        eval('houses.'+myhouse+'.ready = 0');

        disablePopup2();
        myInterval = setInterval("refresh();", 3000);

    };
};

//Crowkillers for other bidders function
function crowkillers3(terrname) {
    if ( eval('units.'+terrname+'.control') == mycontrol && (eval('units.'+terrname+'.unit1') == 'K1' || eval('units.'+terrname+'.unit2') == 'K1' || eval('units.'+terrname+'.unit3') == 'K1' || eval('units.'+terrname+'.unit4') == 'K1') && eval('houses.'+myhouse+'.ready') < 2 ) {
        if (supplyFM(mycontrol) < 10) {//degrade KN
            //search for Knight
            if (eval('units.'+terrname+'.unit1') == 'K1') {
                var targetunit = 'unit1';
                eval('units.'+terrname+'.unit1 = "F1"');
            } else if (eval('units.'+terrname+'.unit2') == 'K1') {
                var targetunit = 'unit2';
                eval('units.'+terrname+'.unit2 = "F1"');
            } else if (eval('units.'+terrname+'.unit3') == 'K1') {
                var targetunit = 'unit3';
                eval('units.'+terrname+'.unit3 = "F1"');
            } else if (eval('units.'+terrname+'.unit4') == 'K1') {
                var targetunit = 'unit4';
                eval('units.'+terrname+'.unit4 = "F1"');
            };
            $.get('php/degrade_knight.php',{table: terr, target:terrname, targetunit:targetunit});

            $('#'+terrname).html('');
            var tempval = 'units.'+terrname+'.';
            placeunit(tempval, terrname, mycontrol);
            if ($('#'+terrname).hasClass('land')) {
                placegar(tempval, terrname);
            };
        } else {
            //search for Knight
            if (eval('units.'+terrname+'.unit1') == 'K1') {
                var targetunit = 'unit1';
            } else if (eval('units.'+terrname+'.unit2') == 'K1') {
                var targetunit = 'unit2';
            } else if (eval('units.'+terrname+'.unit3') == 'K1') {
                var targetunit = 'unit3';
            } else if (eval('units.'+terrname+'.unit4') == 'K1') {
                var targetunit = 'unit4';
            };
            //remove Knight
            $.getJSON('php/remove_unit.php',{terr: terr, target:terrname, targetunit:targetunit, house:house}, function(json) {
                eval('units.'+terrname+'.unit1 = "'+json.unit1+'"');
                eval('units.'+terrname+'.unit2 = "'+json.unit2+'"');
                eval('units.'+terrname+'.unit3 = "'+json.unit3+'"');
                eval('units.'+terrname+'.unit4 = "'+json.unit4+'"');

                $('#'+terrname).html('');
                var tempval = 'units.'+terrname+'.';
                placeunit(tempval, terrname, mycontrol);
                if ($('#'+terrname).hasClass('land')) {
                    placegar(tempval, terrname);
                };
            });
        };

        eval('houses.'+myhouse+'.ready++');
        if (eval('houses.'+myhouse+'.ready') == 2 || supplyKN(mycontrol) == 0) {//if degraded 2 KNs or no Kns left
            if (faza == 17) {
                $.get('php/crowkillers_end3.php',{house: house, id: game_id});
            } else if (faza == 19) {
                $.get('php/crowkillers_end4.php',{house: house, id: game_id});
            }
            disablePopup2();
            myInterval = setInterval("refresh();", 3000);
        } else {
            $.get('php/player_ready.php',{table: house, myhouse: myhouse, id: game_id});
        };
    };
};

//Remove units for Mamoth Riders lowest bidder function
function mamoth(terrname) {
    if (eval('units.'+terrname+'.control') == mycontrol && eval('units.'+terrname+'.unit1') != 0) {
        //units selection
        $("#popup3Content").html('<p>Click on unit to remove it:</p>');
        var tempval = 'units.'+terrname+'.';
        placeunitsup(tempval, 'popup3Content', mycontrol);
        //centering with css
        centerPopup3();
        //load popup
        loadPopup3();

        //click on unit
        $("#popup3Content div.selectunit").click(function(){
            var nomer = $(this).html();
            $.getJSON('php/remove_unit.php',{terr: terr, target:terrname, targetunit:nomer, house:house}, function(json) {
                eval('units.'+terrname+'.unit1 = "'+json.unit1+'"');
                eval('units.'+terrname+'.unit2 = "'+json.unit2+'"');
                eval('units.'+terrname+'.unit3 = "'+json.unit3+'"');
                eval('units.'+terrname+'.unit4 = "'+json.unit4+'"');

                $('#'+terrname).html('');
                var tempval = 'units.'+terrname+'.';
                placeunit(tempval, terrname, mycontrol);
                if ($('#'+terrname).hasClass('land')) {
                    placegar(tempval, terrname);
                };

            });
            disablePopup3();

            if (eval('houses.'+myhouse+'.ready') == 2) {//if its 3rd removed unit
                $.get('php/crowkillers_end2.php',{id: game_id});
                currentplayer = 1;
                myInterval = setInterval("refresh();", 3000);
                disablePopup2();
            } else {
                $.get('php/player_ready.php',{table: house, myhouse: myhouse, id: game_id});
                eval('houses.'+myhouse+'.ready++');
            };

            return false;
        });
    };
};

//Remove units for Mamoth Riders other bidders function
function mamoth2(terrname) {
    if (eval('units.'+terrname+'.control') == mycontrol && eval('units.'+terrname+'.unit1') != 0) {
        //units selection
        $("#popup3Content").html('<p>Click on unit to remove it:</p>');
        var tempval = 'units.'+terrname+'.';
        placeunitsup(tempval, 'popup3Content', mycontrol);
        //centering with css
        centerPopup3();
        //load popup
        loadPopup3();

        //click on unit
        $("#popup3Content div.selectunit").click(function(){
            var nomer = $(this).html();
            $.getJSON('php/remove_unit.php',{terr: terr, target:terrname, targetunit:nomer, house:house}, function(json) {
                eval('units.'+terrname+'.unit1 = "'+json.unit1+'"');
                eval('units.'+terrname+'.unit2 = "'+json.unit2+'"');
                eval('units.'+terrname+'.unit3 = "'+json.unit3+'"');
                eval('units.'+terrname+'.unit4 = "'+json.unit4+'"');

                $('#'+terrname).html('');
                var tempval = 'units.'+terrname+'.';
                placeunit(tempval, terrname, mycontrol);
                if ($('#'+terrname).hasClass('land')) {
                    placegar(tempval, terrname);
                };

            });
            disablePopup3();

            if (eval('houses.'+myhouse+'.ready') == 1) {//if its 2nd removed unit
                if (faza == 17) {
                    $.get('php/crowkillers_end3.php',{house: house, id: game_id});
                } else if (faza == 19) {
                    $.get('php/crowkillers_end4.php',{house: house, id: game_id});
                }
                currentplayer = 1;
                myInterval = setInterval("refresh();", 3000);
                disablePopup2();
            } else {
                $.get('php/player_ready.php',{table: house, myhouse: myhouse, id: game_id});
                eval('houses.'+myhouse+'.ready++');
            };

            return false;
        });
    };
};

//The Horde Descends highest bidder function
function thehorde(terrname) {
    if ( eval('units.'+terrname+'.castle') >0 && eval('units.'+terrname+'.control') == mycontrol ) {
        var points = eval('units.'+terrname+'.castle');

        //footman in the area
        $("#popup2Content").html('<h4>Mustering points: '+points+'</h4><p>Click on footman to upgrade or on + to muster new unit:</p>');
        var tempval = 'units.'+terrname+'.';
        placeunitupgrade(tempval, 'popup2Content', mycontrol);

        //new unit
        $("#popup2Content").append('<div id="newunit">+</div><div class="clearfix"></div><a class="button Select" href="#">Done</a>');
        $("#popup2Error").html('');
        //centering with css
        centerPopup2();
        //load popup
        loadPopup2();

        //click on footman
        $("#popup2Content div.selectunit").live('click', function(){
            $("#popup3Content").html('<a id="toKnight" class="button">Knight</a><a id="toEngine" class="button">Siege Engine</a>');
            centerPopup3();
            loadPopup3();

            //upgrade to Knight
            $("#toKnight").click(function(){
                //make backup
                var upgbackup = cloneObj(eval('units.'+terrname));

                //forming new units object
                if (eval('units.'+terrname+'.unit1') == 'F1') {
                    eval('units.'+terrname+'.unit1 = "K1"');
                    var targetunit = 'unit1';
                } else if (eval('units.'+terrname+'.unit2') == 'F1') {
                    eval('units.'+terrname+'.unit2 = "K1"');
                    var targetunit = 'unit2';
                } else if (eval('units.'+terrname+'.unit3') == 'F1') {
                    eval('units.'+terrname+'.unit3 = "K1"');
                    var targetunit = 'unit3';
                } else if (eval('units.'+terrname+'.unit4') == 'F1') {
                    eval('units.'+terrname+'.unit4 = "K1"');
                    var targetunit = 'unit4';
                };

                //check new limits
                if (supplylimit(mycontrol, myhouse)) {
                    //objects on map setup
                    $('#board .land').each(function() {
                        $(this).html('');
                        var tempval = 'units.'+$(this).attr("id")+'.';
                        var house = eval('units.'+$(this).attr("id")+'.control');
                        placeunit(tempval, $(this).attr("id"), house);
                        placegar(tempval, $(this).attr("id"));
                        placetoken(tempval, $(this).attr("id"), house);
                    });
                    $.get('php/upgrade_knight3.php',{table: terr, target:terrname, targetunit:targetunit});
                    disablePopup3();

                    points--;
                    if (points == 0) {
                        disablePopup();
                        disablePopup2();
                        disableReady();
                        $.get('php/crowkillers_end.php',{house: house, myhouse: myhouse, id: game_id});
                        myInterval = setInterval("refresh();", 3000);
                    } else {
                        //footman upgrade
                        $("#popup2Content").html('<h4>Mustering points: '+points+'</h4><p>Click on footman to upgrade or on + to muster new unit:</p>');
                        var tempval = 'units.'+terrname+'.';
                        placeunitupgrade(tempval, 'popup2Content', mycontrol);

                        //new unit
                        $("#popup2Content").append('<div id="newunit">+</div><div class="clearfix"></div><a class="button Select" href="#">OK</a>');
                        $("#popup2Error").html('');
                        //centering with css
                        centerPopup2();

                        $.get('php/player_ready.php',{table: house, myhouse: myhouse, id: game_id});
                        eval('houses.'+myhouse+'.ready++');
                    };
                } else {
                    $("#popup2Error").html('<p>Not enough supply!</p>');
                    eval('units.'+terrname+' = cloneObj(upgbackup)');
                    disablePopup3();
                };
                return false;
            });
            //upgrade to Siege Engine
            $("#toEngine").click(function(){
                //make backup
                var upgbackup = cloneObj(eval('units.'+terrname));

                //forming new units object
                if (eval('units.'+terrname+'.unit1') == 'F1') {
                    eval('units.'+terrname+'.unit1 = "E1"');
                    var targetunit = 'unit1';
                } else if (eval('units.'+terrname+'.unit2') == 'F1') {
                    eval('units.'+terrname+'.unit2 = "E1"');
                    var targetunit = 'unit2';
                } else if (eval('units.'+terrname+'.unit3') == 'F1') {
                    eval('units.'+terrname+'.unit3 = "E1"');
                    var targetunit = 'unit3';
                } else if (eval('units.'+terrname+'.unit4') == 'F1') {
                    eval('units.'+terrname+'.unit4 = "E1"');
                    var targetunit = 'unit4';
                };

                //check new limits
                if (supplylimit(mycontrol, myhouse)) {
                    //objects on map setup
                    $('#board .land').each(function() {
                        $(this).html('');
                        var tempval = 'units.'+$(this).attr("id")+'.';
                        var house = eval('units.'+$(this).attr("id")+'.control');
                        placeunit(tempval, $(this).attr("id"), house);
                        placegar(tempval, $(this).attr("id"));
                        placetoken(tempval, $(this).attr("id"), house);
                    });
                    $.get('php/upgrade_engine3.php',{table: terr, target:terrname, targetunit:targetunit});
                    disablePopup3();

                    points--;
                    if (points == 0) {
                        disablePopup();
                        disablePopup2();
                        disableReady();
                        $.get('php/crowkillers_end.php',{house: house, myhouse: myhouse, id: game_id});
                        myInterval = setInterval("refresh();", 3000);
                    } else {
                        //footman upgrade
                        $("#popup2Content").html('<h4>Mustering points: '+points+'</h4><p>Click on footman to upgrade or on + to muster new unit:</p>');
                        var tempval = 'units.'+terrname+'.';
                        placeunitupgrade(tempval, 'popup2Content', mycontrol);

                        //new unit
                        $("#popup2Content").append('<div id="newunit">+</div><div class="clearfix"></div><a class="button Select" href="#">OK</a>');
                        $("#popup2Error").html('');
                        //centering with css
                        centerPopup2();

                        $.get('php/player_ready.php',{table: house, myhouse: myhouse, id: game_id});
                        eval('houses.'+myhouse+'.ready++');
                    };
                } else {
                    $("#popup2Error").html('<p>Not enough supply!</p>');
                    eval('units.'+terrname+' = cloneObj(upgbackup)');
                    disablePopup3();
                };
                return false;
            });

            return false;
        });

        //click on +
        $("#newunit").live('click', function(){
            $("#popup3Content").html('<p>Click on unit to muster it:</p><div id="chooseupg"></div>');
            if (eval('units.'+terrname+'.unit4') == 0) {
                $("#chooseupg").append('<div class="'+ mycontrol +'F1 footman selectunit"></div>');
                if (points == 2) {
                    $("#chooseupg").append('<div class="'+ mycontrol +'K1 knight selectunit"></div>');
                    $("#chooseupg").append('<div class="'+ mycontrol +'E1 engine selectunit"></div>');
                };
            };

            //determine water areas
            var muswater = new Array();
            var i = 0;
            for (name in units) {
                var tempval = eval(units[name]);
                if ((tempval.control == mycontrol || tempval.control == 0) && tempval.unit4 == 0 && (eval('karta.'+terrname+'.'+name) == 2 || eval('karta.'+terrname+'.'+name) == 3)) {
                    muswater[i] = name;
                    i++;
                };
            };
            if (muswater[0] != undefined) {
                $("#chooseupg").append('<div class="'+ mycontrol +'S1 ship selectunit"></div>');
            }
            centerPopup3();
            loadPopup3();

            //muster Footman
            $("#chooseupg .footman").click(function(){
                //make backup
                var upgbackup = cloneObj(eval('units.'+terrname));

                //forming new units object
                if (eval('units.'+terrname+'.unit1') == 0) {
                    eval('units.'+terrname+'.unit1 = "F1"');
                    var targetunit = 'unit1';
                } else if (eval('units.'+terrname+'.unit2') == 0) {
                    eval('units.'+terrname+'.unit2 = "F1"');
                    var targetunit = 'unit2';
                } else if (eval('units.'+terrname+'.unit3') == 0) {
                    eval('units.'+terrname+'.unit3 = "F1"');
                    var targetunit = 'unit3';
                } else {
                    eval('units.'+terrname+'.unit4 = "F1"');
                    var targetunit = 'unit4';
                };

                //check new limits
                if (supplylimit(mycontrol, myhouse)) {
                    //objects on map setup
                    $('#board .land').each(function() {
                        $(this).html('');
                        var tempval = 'units.'+$(this).attr("id")+'.';
                        var house = eval('units.'+$(this).attr("id")+'.control');
                        placeunit(tempval, $(this).attr("id"), house);
                        placegar(tempval, $(this).attr("id"));
                        placetoken(tempval, $(this).attr("id"), house);
                    });
                    $.get('php/muster_fm3.php',{table: terr, target:terrname, targetunit:targetunit});
                    disablePopup3();

                    points--;
                    if (points == 0) {
                        disablePopup();
                        disablePopup2();
                        disableReady();
                        $.get('php/crowkillers_end.php',{house: house, myhouse: myhouse, id: game_id});
                        myInterval = setInterval("refresh();", 3000);
                    } else {
                        //footman upgrade
                        $("#popup2Content").html('<h4>Mustering points: '+points+'</h4><p>Click on footman to upgrade or on + to muster new unit:</p>');
                        var tempval = 'units.'+terrname+'.';
                        placeunitupgrade(tempval, 'popup2Content', mycontrol);

                        //new unit
                        $("#popup2Content").append('<div id="newunit">+</div><div class="clearfix"></div><a class="button Select" href="#">OK</a>');
                        $("#popup2Error").html('');
                        //centering with css
                        centerPopup2();

                        $.get('php/player_ready.php',{table: house, myhouse: myhouse, id: game_id});
                        eval('houses.'+myhouse+'.ready++');
                    };
                } else {
                    $("#popup2Error").html('<p>Not enough supply!</p>');
                    eval('units.'+terrname+' = cloneObj(upgbackup)');
                    disablePopup3();
                };
                return false;
            });
            //muster Knight
            $("#chooseupg .knight").click(function(){
                //make backup
                var upgbackup = cloneObj(eval('units.'+terrname));

                //forming new units object
                if (eval('units.'+terrname+'.unit1') == 0) {
                    eval('units.'+terrname+'.unit1 = "K1"');
                    var targetunit = 'unit1';
                } else if (eval('units.'+terrname+'.unit2') == 0) {
                    eval('units.'+terrname+'.unit2 = "K1"');
                    var targetunit = 'unit2';
                } else if (eval('units.'+terrname+'.unit3') == 0) {
                    eval('units.'+terrname+'.unit3 = "K1"');
                    var targetunit = 'unit3';
                } else {
                    eval('units.'+terrname+'.unit4 = "K1"');
                    var targetunit = 'unit4';
                };

                //check new limits
                if (supplylimit(mycontrol, myhouse)) {
                    //objects on map setup
                    $('#board .land').each(function() {
                        $(this).html('');
                        var tempval = 'units.'+$(this).attr("id")+'.';
                        var house = eval('units.'+$(this).attr("id")+'.control');
                        placeunit(tempval, $(this).attr("id"), house);
                        placegar(tempval, $(this).attr("id"));
                        placetoken(tempval, $(this).attr("id"), house);
                    });
                    $.get('php/upgrade_knight3.php',{table: terr, target:terrname, targetunit:targetunit});

                    disablePopup3();

                    disablePopup();
                    disablePopup2();
                    disableReady();
                    $.get('php/crowkillers_end.php',{house: house, myhouse: myhouse, id: game_id});
                    myInterval = setInterval("refresh();", 3000);
                } else {
                    $("#popup2Error").html('<p>Not enough supply!</p>');
                    eval('units.'+terrname+' = cloneObj(upgbackup)');
                    disablePopup3();
                };
                return false;
            });
            //muster Siege Engine
            $("#chooseupg .engine").click(function(){
                //make backup
                var upgbackup = cloneObj(eval('units.'+terrname));

                //forming new units object
                if (eval('units.'+terrname+'.unit1') == 0) {
                    eval('units.'+terrname+'.unit1 = "E1"');
                    var targetunit = 'unit1';
                } else if (eval('units.'+terrname+'.unit2') == 0) {
                    eval('units.'+terrname+'.unit2 = "E1"');
                    var targetunit = 'unit2';
                } else if (eval('units.'+terrname+'.unit3') == 0) {
                    eval('units.'+terrname+'.unit3 = "E1"');
                    var targetunit = 'unit3';
                } else {
                    eval('units.'+terrname+'.unit4 = "E1"');
                    var targetunit = 'unit4';
                };

                //check new limits
                if (supplylimit(mycontrol, myhouse)) {
                    //objects on map setup
                    $('#board .land').each(function() {
                        $(this).html('');
                        var tempval = 'units.'+$(this).attr("id")+'.';
                        var house = eval('units.'+$(this).attr("id")+'.control');
                        placeunit(tempval, $(this).attr("id"), house);
                        placegar(tempval, $(this).attr("id"));
                        placetoken(tempval, $(this).attr("id"), house);
                    });
                    $.get('php/upgrade_engine3.php',{table: terr, target:terrname, targetunit:targetunit});

                    disablePopup3();

                    disablePopup();
                    disablePopup2();
                    disableReady();
                    $.get('php/crowkillers_end.php',{house: house, myhouse: myhouse, id: game_id});
                    myInterval = setInterval("refresh();", 3000);
                } else {
                    $("#popup2Error").html('<p>Not enough supply!</p>');
                    eval('units.'+terrname+' = cloneObj(upgbackup)');
                    disablePopup3();
                };
                return false;
            });
            //muster Ship
            $("#chooseupg .ship").click(function(){
                //nearby water areas
                if (muswater[1] != undefined) {
                    $("#popup3Content").html('<p>Where you want to muster ship:</p><div id="choosewater"></div>');
                    for (i=0; i<muswater.length; i++) {
                        $("#choosewater").append('<a class="button">'+muswater[i]+'</a>');
                    };
                    centerPopup3();
                    //choose area
                    $("#choosewater .button").click(function(){
                        var tempwater = $(this).html();
                        //make backup
                        var upgbackup = cloneObj(eval('units.'+tempwater));

                        //forming new units object
                        if (eval('units.'+tempwater+'.unit1') == 0) {
                            eval('units.'+tempwater+'.unit1 = "S1"');
                            var targetunit = 'unit1';
                        } else if (eval('units.'+tempwater+'.unit2') == 0) {
                            eval('units.'+tempwater+'.unit2 = "S1"');
                            var targetunit = 'unit2';
                        } else if (eval('units.'+tempwater+'.unit3') == 0) {
                            eval('units.'+tempwater+'.unit3 = "S1"');
                            var targetunit = 'unit3';
                        } else {
                            eval('units.'+tempwater+'.unit4 = "S1"');
                            var targetunit = 'unit4';
                        };

                        //check new limits
                        if (supplylimit(mycontrol, myhouse)) {
                            //objects on map setup
                            $('#board .water').each(function() {
                                $(this).html('');
                                var tempval = 'units.'+$(this).attr("id")+'.';
                                var house = eval('units.'+$(this).attr("id")+'.control');
                                placeunit(tempval, $(this).attr("id"), house);
                            });
                            $.get('php/muster_sh3.php',{table: terr, target:tempwater, targetunit:targetunit, control:mycontrol});
                            disablePopup3();

                            points--;
                            if (points == 0) {
                                disablePopup();
                                disablePopup2();
                                disableReady();
                                $.get('php/crowkillers_end.php',{house: house, myhouse: myhouse, id: game_id});
                                myInterval = setInterval("refresh();", 3000);
                            } else {
                                //footman upgrade
                                $("#popup2Content").html('<h4>Mustering points: '+points+'</h4><p>Click on footman to upgrade or on + to muster new unit:</p>');
                                var tempval = 'units.'+terrname+'.';
                                placeunitupgrade(tempval, 'popup2Content', mycontrol);

                                //new unit
                                $("#popup2Content").append('<div id="newunit">+</div><div class="clearfix"></div><a class="button Select" href="#">OK</a>');
                                $("#popup2Error").html('');
                                //centering with css
                                centerPopup2();

                                $.get('php/player_ready.php',{table: house, myhouse: myhouse, id: game_id});
                                eval('houses.'+myhouse+'.ready++');
                            };
                        } else {
                            $("#popup2Error").html('<p>Not enough supply!</p>');
                            eval('units.'+tempwater+' = cloneObj(upgbackup)');
                            disablePopup3();
                        };
                        return false;
                    });

                } else {
                    var tempwater = muswater[0];
                    //make backup
                    var upgbackup = cloneObj(eval('units.'+tempwater));

                    //forming new units object
                    if (eval('units.'+tempwater+'.unit1') == 0) {
                        eval('units.'+tempwater+'.unit1 = "S1"');
                        var targetunit = 'unit1';
                    } else if (eval('units.'+tempwater+'.unit2') == 0) {
                        eval('units.'+tempwater+'.unit2 = "S1"');
                        var targetunit = 'unit2';
                    } else if (eval('units.'+tempwater+'.unit3') == 0) {
                        eval('units.'+tempwater+'.unit3 = "S1"');
                        var targetunit = 'unit3';
                    } else {
                        eval('units.'+tempwater+'.unit4 = "S1"');
                        var targetunit = 'unit4';
                    };

                    //check new limits
                    if (supplylimit(mycontrol, myhouse)) {
                        //objects on map setup
                        $('#board .water').each(function() {
                            $(this).html('');
                            var tempval = 'units.'+$(this).attr("id")+'.';
                            var house = eval('units.'+$(this).attr("id")+'.control');
                            placeunit(tempval, $(this).attr("id"), house);
                        });
                        $.get('php/muster_sh3.php',{table: terr, target:tempwater, targetunit:targetunit, control:mycontrol});
                        disablePopup3();

                        points--;
                        if (points == 0) {
                            disablePopup();
                            disablePopup2();
                            disableReady();
                            $.get('php/crowkillers_end.php',{house: house, myhouse: myhouse, id: game_id});
                            myInterval = setInterval("refresh();", 3000);
                        } else {
                            //footman upgrade
                            $("#popup2Content").html('<h4>Mustering points: '+points+'</h4><p>Click on footman to upgrade or on + to muster new unit:</p>');
                            var tempval = 'units.'+terrname+'.';
                            placeunitupgrade(tempval, 'popup2Content', mycontrol);

                            //new unit
                            $("#popup2Content").append('<div id="newunit">+</div><div class="clearfix"></div><a class="button Select" href="#">OK</a>');
                            $("#popup2Error").html('');
                            //centering with css
                            centerPopup2();

                            $.get('php/player_ready.php',{table: house, myhouse: myhouse, id: game_id});
                            eval('houses.'+myhouse+'.ready++');
                        };
                    } else {
                        $("#popup2Error").html('<p>Not enough supply!</p>');
                        eval('units.'+tempwater+' = cloneObj(upgbackup)');
                        disablePopup3();
                    };
                };
                return false;
            });

            return false;
        });

        //click on Select button
        $("#popup2Content a.Select").live('click', function(){
            if (eval('houses.'+myhouse+'.ready') == 0) {
                disablePopup2();
            } else {
                disablePopup();
                disablePopup2();
                disableReady();
                $.get('php/crowkillers_end.php',{house: house, myhouse: myhouse, id: game_id});
                myInterval = setInterval("refresh();", 3000);
            }
            return false;
        });

    };
};

//Remove units for The Horde Descends lowest bidder function
function thehorde2(terrname) {
    if (eval('units.'+terrname+'.control') == mycontrol && eval('units.'+terrname+'.unit1') != 0) {
        if (hordezamki[0] != undefined) {//player have castles with 2 units
            if ($.inArray(terrname, hordezamki) != -1) {
                if (eval('units.'+terrname+'.unit3') == 0) {//if only 2 units in castle auto-remove
                    $.get('php/remove_units.php',{terr: terr, target:terrname, house:house});

                    $.get('php/crowkillers_end2.php',{id: game_id});
                    currentplayer = 1;
                    disablePopup2();
                    hordezamki = [];
                    myInterval = setInterval("refresh();", 3000);
                } else {
                    //units selection
                    $("#popup3Content").html('<p>Select 2 units. Click on unit to select it:</p>');
                    var tempval = 'units.'+terrname+'.';
                    placeunitsup(tempval, 'popup3Content', mycontrol);
                    $("#popup3Content").append('<div class="clearfix"></div><a class="button Select" href="#">Remove</a>');

                    //centering with css
                    centerPopup3();
                    //load popup
                    loadPopup3();

                    var nomer1;
                    var nomer2;
                    //click on unit
                    $("#popup3Content div.selectunit").click(function(){
                        var nomer = $(this).html();
                        if (nomer1 != nomer && nomer2 != nomer) {
                            if (nomer1 == undefined || nomer1 == 0) {
                                nomer1 = nomer;
                                $(this).addClass('selected');
                            } else if (nomer2 == undefined || nomer2 == 0) {
                                nomer2 = nomer;
                                $(this).addClass('selected');
                            }
                        } else {
                            if (nomer1 == nomer) {
                                nomer1 = 0;
                                $(this).removeClass('selected');
                            } else {
                                nomer2 = 0;
                                $(this).removeClass('selected');
                            }
                        };
                        return false;
                    });

                    //click on Select button
                    $("#popup3Content a.Select").live('click', function(){
                        if (nomer1 != undefined && nomer1 != 0 && nomer2 != undefined && nomer2 != 0) {
                            $.getJSON('php/remove_unit2.php',{terr: terr, target:terrname, targetunit1:nomer1, targetunit2:nomer2, house: house});
                            disablePopup3();

                            $.get('php/crowkillers_end2.php',{id: game_id});
                            currentplayer = 1;
                            disablePopup2();
                            hordezamki = [];
                            myInterval = setInterval("refresh();", 3000);
                        }
                        return false;
                    });
                }
            };
        } else {//no castles with 2 units
            //units selection
            $("#popup3Content").html('<p>Click on unit to remove it:</p>');
            var tempval = 'units.'+terrname+'.';
            placeunitsup(tempval, 'popup3Content', mycontrol);
            //centering with css
            centerPopup3();
            //load popup
            loadPopup3();

            //click on unit
            $("#popup3Content div.selectunit").click(function(){
                var nomer = $(this).html();
                $.getJSON('php/remove_unit.php',{terr: terr, target:terrname, targetunit:nomer, house:house}, function(json) {
                    eval('units.'+terrname+'.unit1 = "'+json.unit1+'"');
                    eval('units.'+terrname+'.unit2 = "'+json.unit2+'"');
                    eval('units.'+terrname+'.unit3 = "'+json.unit3+'"');
                    eval('units.'+terrname+'.unit4 = "'+json.unit4+'"');

                    $('#'+terrname).html('');
                    var tempval = 'units.'+terrname+'.';
                    placeunit(tempval, terrname, mycontrol);
                    if ($('#'+terrname).hasClass('land')) {
                        placegar(tempval, terrname);
                    };

                });
                disablePopup3();

                if (eval('houses.'+myhouse+'.ready') == 1) {//if its 2nd removed unit
                    $.get('php/crowkillers_end2.php',{id: game_id});
                    currentplayer = 1;
                    myInterval = setInterval("refresh();", 3000);
                    disablePopup2();
                } else {
                    $.get('php/player_ready.php',{table: house, myhouse: myhouse, id: game_id});
                    eval('houses.'+myhouse+'.ready++');
                };

                return false;
            });
        }

    };
};

//Remove unit for The Horde Descends other bidders function
function thehorde3(terrname) {
    if (eval('units.'+terrname+'.control') == mycontrol && eval('units.'+terrname+'.unit1') != 0) {
        //units selection
        $("#popup3Content").html('<p>Click on unit to remove it:</p>');
        var tempval = 'units.'+terrname+'.';
        placeunitsup(tempval, 'popup3Content', mycontrol);
        //centering with css
        centerPopup3();
        //load popup
        loadPopup3();

        //click on unit
        $("#popup3Content div.selectunit").click(function(){
            var nomer = $(this).html();
            $.getJSON('php/remove_unit.php',{terr: terr, target:terrname, targetunit:nomer, house:house}, function(json) {
                eval('units.'+terrname+'.unit1 = "'+json.unit1+'"');
                eval('units.'+terrname+'.unit2 = "'+json.unit2+'"');
                eval('units.'+terrname+'.unit3 = "'+json.unit3+'"');
                eval('units.'+terrname+'.unit4 = "'+json.unit4+'"');

                $('#'+terrname).html('');
                var tempval = 'units.'+terrname+'.';
                placeunit(tempval, terrname, mycontrol);
                if ($('#'+terrname).hasClass('land')) {
                    placegar(tempval, terrname);
                };

            });
            disablePopup3();

            if (faza == 17) {
                $.get('php/crowkillers_end3.php',{house: house, id: game_id});
            } else if (faza == 19) {
                $.get('php/crowkillers_end4.php',{house: house, id: game_id});
            }
            currentplayer = 1;
            myInterval = setInterval("refresh();", 3000);
            disablePopup2();

            return false;
        });
    };
};

//Remove units for Preepmtive Raid lowest bidder function
function preemptive(terrname) {
    if (eval('units.'+terrname+'.control') == mycontrol && eval('units.'+terrname+'.unit1') != 0) {
        //units selection
        $("#popup3Content").html('<p>Click on unit to remove it:</p>');
        var tempval = 'units.'+terrname+'.';
        placeunitsup(tempval, 'popup3Content', mycontrol);
        //centering with css
        centerPopup3();
        //load popup
        loadPopup3();

        //click on unit
        $("#popup3Content div.selectunit").click(function(){
            var nomer = $(this).html();
            $.getJSON('php/remove_unit.php',{terr: terr, target:terrname, targetunit:nomer, house:house}, function(json) {
                eval('units.'+terrname+'.unit1 = "'+json.unit1+'"');
                eval('units.'+terrname+'.unit2 = "'+json.unit2+'"');
                eval('units.'+terrname+'.unit3 = "'+json.unit3+'"');
                eval('units.'+terrname+'.unit4 = "'+json.unit4+'"');

                $('#'+terrname).html('');
                var tempval = 'units.'+terrname+'.';
                placeunit(tempval, terrname, mycontrol);
                if ($('#'+terrname).hasClass('land')) {
                    placegar(tempval, terrname);
                };

            });
            disablePopup3();

            if (eval('houses.'+myhouse+'.ready') == 2) {//if its 2nd removed unit
                $.get('php/preemptive_end.php',{id: game_id, house: house, myhouse: myhouse});
                myInterval = setInterval("refresh();", 3000);
                disable2Popup2();
            } else {
                $.get('php/player_ready.php',{table: house, myhouse: myhouse, id: game_id});
                eval('houses.'+myhouse+'.ready++');
            };

            return false;
        });
    };
};

//Ready button
function loadReady(){
	if (faza == 3) {
		if (eval('houses.'+myhouse+'.ready') == 0) {
			$("#Readybutton").removeClass("ready").addClass("notready").html('Not ready');
		} else {
			$("#Readybutton").removeClass("notready").addClass("ready").html('Ready');
		}
	} else if (faza == 5 || faza == 6) {
		$("#Readybutton").removeClass("ready").addClass("notready").html('Cansel');
	} else if (faza == 0) {
        $("#Readybutton").removeClass("notready").addClass("ready").html('Done');
    } else if (faza == 17 || faza == 19) {
        $("#Readybutton").removeClass("notready").addClass("ready").html('Done');
    };
	$("#Readybutton").fadeIn("fast");
}

function disableReady(){
		$("#Readybutton").fadeOut("fast");
}

//auto start functions !!!!!
$(document).ready(function(){
	
	//greet user
	if (user_login != "er") {
		$("#usermenu").html('<p>Hello, <b>'+user_login+'</b>!</p><a id="logout" class="button">Log out</a><a class="button mainmenu" href="#">Main menu</a>');
	} else {game_id = 1;}
	
	//select data from bd
	initialize();
	
	//stop auto-refreshing from bd if page blured
	$(window).focus(function () {
        clearInterval(myInterval); // Clearing interval if for some reason it has not been cleared yet
        if  (!is_interval_running) {//Optional
			if (starting != 0 && faza == 6) {} else {
				myInterval = setInterval("refresh();", 3000);
			}
		}
    }).blur(function () {
		clearInterval(myInterval); // Clearing interval on window blur
		is_interval_running = false; //Optional
    });
	
	//click on land
	$("div.land").click(function(){
		var terrname = $(this).attr("id");
		//planning phase
		if (faza == 3 && eval('houses.'+myhouse+'.ready') == 0) {
			planningphase(terrname);
		} else if (faza == 4 && mycourt == 0) {
			ravenphase(terrname);
		} else if (faza == 5 && myhouse == currentplayer) {
			raidphase(terrname);
		} else if (faza == 6 && myhouse == currentplayer) {
			marchphase(terrname);
		} else if (myhouse == battle.currentplayer && faza == 12 && myhouse != battle.winner) {
			retreatphase(terrname);
		} else if (myhouse == battle.currentplayer && faza == 12 && myhouse == battle.winner) {
			robbphase(terrname);
		} else if (faza == 14 && myhouse == currentplayer) {
			consolidatephase(terrname);
		} else if (faza == 0 && myhouse == currentplayer && eval('WC1['+turn+']') == 1) {
			mustering(terrname);
		} else if (faza == 0 && eval('WC1['+turn+']') == 2 && wildpower != 6) {
            supply(terrname);
        } else if ((faza == 17 || faza == 19) && WAconseq.winner == 'Watch' && wildcard == 0 && myhouse == WAconseq.dsup1) {
            crowkillers(terrname);
        } else if (((faza == 17 && myhouse == WAconseq.dsup6) || (faza == 19 && myhouse == WAconseq.dsup5)) && WAconseq.winner == 'Wildlings' && wildcard == 0 && currentplayer == 0) {
            crowkillers2(terrname);
        } else if ((faza == 17 || faza == 19) && WAconseq.winner == 'Wildlings' && wildcard == 0 && myhouse == currentplayer && eval('houses.'+myhouse+'.ready') < 2) {
            crowkillers3(terrname);
        } else if (((faza == 17 && myhouse == WAconseq.dsup6) || (faza == 19 && myhouse == WAconseq.dsup5)) && WAconseq.winner == 'Wildlings' && wildcard == 2 && currentplayer == 0) {
            mamoth(terrname);
        } else if ((faza == 17 || faza == 19) && WAconseq.winner == 'Wildlings' && wildcard == 2 && myhouse == currentplayer && eval('houses.'+myhouse+'.ready') < 2) {
            mamoth2(terrname);
        } else if ((faza == 17 || faza == 19) && WAconseq.winner == 'Watch' && wildcard == 3 && myhouse == WAconseq.dsup1 && eval('houses.'+myhouse+'.ready') == 0) {
            thehorde(terrname);
        } else if (((faza == 17 && myhouse == WAconseq.dsup6) || (faza == 19 && myhouse == WAconseq.dsup5)) && WAconseq.winner == 'Wildlings' && wildcard == 3 && currentplayer == 0) {
            thehorde2(terrname);
        } else if ((faza == 17 || faza == 19) && WAconseq.winner == 'Wildlings' && wildcard == 3 && myhouse == currentplayer) {
            thehorde3(terrname);
        } else if (((faza == 17 && myhouse == WAconseq.dsup6) || (faza == 19 && myhouse == WAconseq.dsup5)) && WAconseq.winner == 'Wildlings' && wildcard == 6 && eval('houses.'+myhouse+'.ready') > 0) {
            preemptive(terrname);
        };
		return false;
	});
	
	//click on water
	$("div.water").click(function(){
		var terrname = $(this).attr("id");
		//planning phase
		if (faza == 3 && eval('houses.'+myhouse+'.ready') == 0) {
			planningphase(terrname);
		} else if (faza == 4 && mycourt == 0) {
			ravenphase(terrname);
		} else if (faza == 5 && myhouse == currentplayer) {
			raidphase(terrname);
		} else if (faza == 6 && myhouse == currentplayer) {
			marchphase2(terrname);
		} else if (myhouse == battle.currentplayer && faza == 12 && myhouse != battle.winner) {
			retreatphase2(terrname);
		} else if (myhouse == battle.currentplayer && faza == 12 && myhouse == battle.winner) {
			robbphase2(terrname);
		} else if (faza == 14 && myhouse == currentplayer) {
			consolidatephase2(terrname);
		} else if (faza == 0 && eval('WC1['+turn+']') == 2 && wildpower != 6) {
            supply(terrname);
        } else if (((faza == 17 && myhouse == WAconseq.dsup6) || (faza == 19 && myhouse == WAconseq.dsup5)) && WAconseq.winner == 'Wildlings' && wildcard == 2 && currentplayer == 0) {
            mamoth(terrname);
        } else if ((faza == 17 || faza == 19) && WAconseq.winner == 'Wildlings' && wildcard == 2 && myhouse == currentplayer && eval('houses.'+myhouse+'.ready') < 2) {
            mamoth2(terrname);
        } else if (((faza == 17 && myhouse == WAconseq.dsup6) || (faza == 19 && myhouse == WAconseq.dsup5)) && WAconseq.winner == 'Wildlings' && wildcard == 3 && currentplayer == 0) {
            thehorde2(terrname);
        } else if ((faza == 17 || faza == 19) && WAconseq.winner == 'Wildlings' && wildcard == 3 && myhouse == currentplayer) {
            thehorde3(terrname);
        } else if (((faza == 17 && myhouse == WAconseq.dsup6) || (faza == 19 && myhouse == WAconseq.dsup5)) && WAconseq.winner == 'Wildlings' && wildcard == 6 && eval('houses.'+myhouse+'.ready') > 0) {
            preemptive(terrname);
        };
		return false;
	});
	
	//click on Ready button
	$("#Readybutton").click(function(){
		if (faza == 3 && orders[0] == 0) {
			if (eval('houses.'+myhouse+'.ready') == 0) {
				$.get('php/player_ready.php',{table: house, myhouse: myhouse, id: game_id});
				$(this).removeClass("notready").addClass("ready").html('Ready');
				eval('houses.'+myhouse+'.ready = 1');
				
			} else {
				$.get('php/player_notready.php',{table: house, myhouse: myhouse, id: game_id});
				$(this).removeClass("ready").addClass("notready").html('Not ready');
				eval('houses.'+myhouse+'.ready = 0');
			}
		} else if (faza == 5) {
			$('#'+ starting).removeClass("starting");
			starting = 0;
			disableReady();
		} else if (faza == 6) {
			$('#'+ starting).removeClass("starting");
			starting = 0;
			disableReady();
		} else if (faza == 7) {
			$.get('php/player_ready.php',{table: house, myhouse: myhouse, id: game_id});
		} else if (faza == 0 && eval('WC1['+turn+']') == 1) {
            $.get('php/mustering_next.php',{id: game_id});
            currentplayer = 0;
            disableReady();
            myInterval = setInterval("refresh();", 3000);
        } else if (faza == 0 && eval('WC1['+turn+']') == 2) {
            if (supplylimit(mycontrol, myhouse)) {
                $.get('php/player_ready.php',{table: house, myhouse: myhouse, id: game_id});
                currentplayer = 0;
                disableReady();
                myInterval = setInterval("refresh();", 3000);
                eval('houses.'+myhouse+'.ready = 1');
            } else {
                $("#popup3Content").html('<p>Not enough supply!</p><a id="popupOk" class="button">OK</a>');
                centerPopup3();
                loadPopup3();
            }
        } else if ((faza == 17 || faza == 19) && WAconseq.winner == 'Watch' && (wildcard == 0 || wildcard == 3) && myhouse == WAconseq.dsup1) {
            disablePopup();
            disablePopup2();
            disableReady();
            $.get('php/crowkillers_end.php',{house: house, myhouse: myhouse, id: game_id});
            myInterval = setInterval("refresh();", 3000);
        }
		return false;
	});

	//Raven reveal Wild Card
	$("#WildCard").click(function(){
		if (faza == 4 && mycourt == 0) {
			if (wildcard == 0) {
				$("#WildCard").html('Crowkillers').css("background-color", "#009");
			} else if (wildcard == 1) {
				$("#WildCard").html('Silence at the Wall').css("background-color", "#009");
			} else if (wildcard == 2) {
				$("#WildCard").html('Mammoth Riders').css("background-color", "#009");
			} else if (wildcard == 3) {
				$("#WildCard").html('The Horde Descends').css("background-color", "#009");
			} else if (wildcard == 4) {
				$("#WildCard").html('A King Beyond the Wall').css("background-color", "#009");
			} else if (wildcard == 5) {
				$("#WildCard").html('Rattleshirts Raiders').css("background-color", "#009");
			} else if (wildcard == 6) {
				$("#WildCard").html('Preemptive Raid').css("background-color", "#009");
			} else if (wildcard == 7) {
				$("#WildCard").html('Skinchanger Scout').css("background-color", "#009");
			} else if (wildcard == 8) {
				$("#WildCard").html('Massing on the Milkwater').css("background-color", "#009");
			};
			faza = 5;
			$.get('php/next_phase.php',{table: terr, id: game_id});
			$('#phase').html('Raids');
			return false;
		}
		return false;
	});
	
	//click on sign up
	$("#register").live('click', function(){
		$("#popupContent").html('<form method="post" class="form"><p class="col_50"><label for="login2">Login:</label><br/><input type="text" name="login2" id="login2" value="" tabindex="1" /></p><p class="col_50"><label for="password2">Password:</label><br/><input type="password" name="password2" id="password2" value="" tabindex="1" /></p><div><input id ="register2" type="submit" value="Register" class="button" /></div></form>');
		$("#popupError").html('');
		//centering with css  
		centerPopup();  
		//load popup  
		loadPopup();  
		return false;
	});
	
	//click on x in popup
	$("#popupContactClose").click(function(){  
		disablePopup();
		return false;
	});  
	
	//Click out event!  
	$("#backgroundPopup").click(function(){  
		disablePopup(); 
		disablePopup3(); 
	});
	
	//Click out event!  
	$("#popup #popupOk").live('click', function(){  
		disablePopup();
		return false; 
	});
	$("#popup3 #popupOk").live('click', function(){  
		disablePopup3();
		return false; 
	});
	
	// click on register in popup
	$("#register2").live('click', function(){
		$.post('php/player_reg.php', {login: $("#login2").val(), password: $("#password2").val()}, function(data) {
			if (data == "ok") {
				$("#popupError").html('');
				$("#popupContent").html('<p>Registration completed successfully!</p><a id="popupOk" class="button">OK</a>');
				//centering with css
				centerPopup();
			} else {
				$("#popupError").html(data[0])
			};
		},"json");
		return false;
	});
	
	//click on enter
	$("#enter").live('click', function(){
		$.post('php/player_login.php', {login: $("#login").val(), password: $("#password").val()}, function(data) {
			if (data == "error") {
				$("#popupContent").html('<p>Wrong Login and password combination.</p><a id="popupOk" class="button">OK</a>');
				//centering with css  
				centerPopup();  
				//load popup  
				loadPopup();  
				
			}
			else {
				$.cookie('id', data['id'], { expires: 365, path: '/' });
				$.cookie('hash', data['hash'], { expires: 365, path: '/' });
				user_login = $("#login").val();
				user_id = data['id'];
				if (data['lastgame']==0) {
					game_id = 1;
					$("#popupContent").html('<nav id="main_menu"><ul><li><a id="creategame" class="button" href="#">Create game</a></li><li><a id="joingame" class="button" href="#">Join game</a></li></ul></nav>');
					//centering with css
					centerPopup();
					//load popup
					loadPopup2();
				} else {game_id = data['lastgame'];} 
				$("#usermenu").html('<p>Hello, <b>' + $("#login").val() + '</b>!</p><a id="logout" class="button">Log out</a><a class="button mainmenu" href="#">Main menu</a>');
				initialize();
				
			}
		},"json");
		return false;
	});
	
	//click on log out
	$("#logout").live('click', function(){
		$("#usermenu").html('<form method="post" class="form"><p class="col_50"><label for="login">Login:</label><br/><input type="text" name="login" id="login" value="" tabindex="1" /></p><p class="col_50"><label for="password">Password:</label><br/><input type="password" name="password" id="password" value="" tabindex="1" /></p><div><input id ="enter" type="submit" value="Log in" class="button" /></div><div><input id="register" type="submit" value="Sign up" class="button"/></div></form>');
		$.cookie('id', null);
		$.cookie('hash', null);
		user_login = 0;
		user_id = 0;
		game_id = 1;
		myhouse = 0;
		mycontrol = 0;
		initialize();
		return false;
	});
	
	//click on main menu
	$("a.mainmenu").live('click', function(){
		$("#popupContent").html('<nav id="main_menu"><ul><li><a id="creategame" class="button" href="#">Create game</a></li><li><a id="joingame" class="button" href="#">Join game</a></li></ul></nav>');
		//centering with css
		centerPopup();
		//load popup
		loadPopup();
		return false;
	});
	
	//click on create game
	$("#creategame").live('click', function(){
        $("#popupContent").html('<h2>Choose your house</h5><ul><li><a id="Baratheon" class="button" href="#">Baratheon</a></li><li><a id="Stark" class="button" href="#">Stark</a></li><li><a id="Lannister" class="button" href="#">Lannister</a></li><li><a id="Martell" class="button" href="#">Martell</a></li><li><a id="Greyjoy" class="button" href="#">Greyjoy</a></li><li><a id="Tyrell" class="button" href="#">Tyrell</a></li></ul>');
        //centering with css
        centerPopup();

        $("#popupContent ul li .button").click(function(){
            var housename = $(this).attr("id");
            $.getJSON('php/create_game.php',{user_id:user_id, housename:housename}, function(data){
                game_id = data;
                initialize();
            });
            disablePopup();
            return false;
        });
		return false;
	});
	
	//click on join game
	$("#joingame").live('click', function(){
		$.getJSON('php/list_game.php', function(row){
            if (row!=0) {
                $("#popupContent").html('<h1> Games list </h1><h4>Click on button with House name to join game as that House</h4><table id="gamelist"><tr><td>Game id</td><td>Stark</td><td>Greyjoy</td><td>Lannister</td><td>Martell</td><td>Tyrell</td><td>Baratheon</td></tr></table>');

                for(var i in row) {
                    if (row[i].Stark != user_login && row[i].Greyjoy != user_login && row[i].Lannister != user_login && row[i].Martell != user_login && row[i].Tyrell != user_login && row[i].Baratheon != user_login) {
                        $("#popupContent table").append('<tr id="'+row[i].game+'"><td>'+row[i].game+'</td></tr>');
                        if (row[i].Stark == 0) {
                            $("#"+row[i].game).append('<td><a class="button listed" href="#">Stark</a></td>');
                        } else {
                            $("#"+row[i].game).append('<td>'+row[i].Stark+'</td>');
                        };
                        if (row[i].Greyjoy == 0) {
                            $("#"+row[i].game).append('<td><a class="button listed" href="#">Greyjoy</a></td>');
                        } else {
                            $("#"+row[i].game).append('<td>'+row[i].Greyjoy+'</td>');
                        };
                        if (row[i].Lannister == 0) {
                            $("#"+row[i].game).append('<td><a class="button listed" href="#">Lannister</a></td>');
                        } else {
                            $("#"+row[i].game).append('<td>'+row[i].Lannister+'</td>');
                        };
                        if (row[i].Martell == 0) {
                            $("#"+row[i].game).append('<td><a class="button listed" href="#">Martell</a></td>');
                        } else {
                            $("#"+row[i].game).append('<td>'+row[i].Martell+'</td>');
                        };
                        if (row[i].Tyrell == 0) {
                            $("#"+row[i].game).append('<td><a class="button listed" href="#">Tyrell</a></td>');
                        } else {
                            $("#"+row[i].game).append('<td>'+row[i].Tyrell+'</td>');
                        };
                        if (row[i].Baratheon == 0) {
                            $("#"+row[i].game).append('<td><a class="button listed" href="#">Baratheon</a></td>');
                        } else {
                            $("#"+row[i].game).append('<td>'+row[i].Baratheon+'</td>');
                        };
                    }
                }

                $("#popupContent").append('<a class="button mainmenu" href="#">Main menu</a>');
            } else {$("#popupContent").html('<h1> There is no games to join. </h1><a class="button mainmenu" href="#">Main menu</a>');}
			//centering with css
			centerPopup();
			//load popup
			loadPopup();
		});
		return false;
	});
	
	//click on listed game
	$("a.listed").live('click', function(){
        game_id = $(this).parents('tr').attr("id");
        myhouse = $(this).html();
		$.get('php/join_game.php',{user_id:user_id, game_id:game_id, myhouse:myhouse});
		initialize();
		disablePopup();
		return false;
	});

});
