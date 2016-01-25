<?php
include 'php/database.php';

if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) {   
    $query = mysql_query("SELECT * FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
    $userdata = mysql_fetch_assoc($query);

    if(($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['user_id'] !== $_COOKIE['id'])) {
        echo("<script> var user_login='er';</script>");
    } else {
       echo("<script> var user_login='".$userdata['user_login']."'; var user_id='".$userdata['user_id']."'; var game_id='".$userdata['lastgame']."';</script>");
    }
} else {
    echo("<script> var user_login='er';</script>");
}

?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Game of Thrones Board game</title>
<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="jquery.cookie.js"></script>
<script type="text/javascript" src="tictactoe.js"></script> 
</head>

<body>
<div class="container">
	<header class="header clearfix">
      <div class="logo">Game of Thrones Board game</div>

      <div id="usermenu">
          <form method="post" class="form">
            <p>
              <label for="login">Login:</label><br/>
              <input type="text" name="login" id="login" value="" tabindex="1" />
            </p>
            <p>
              <label for="password">Password:</label><br/>
              <input type="password" name="password" id="password" value="" tabindex="1" />
            </p>
            <div>
              <input id ="enter" type="submit" value="Log in" class="button" />
            </div>
            <div>
			  <input id="register" type="submit" value="Sign up" class="button"/>
            </div>
          </form>
      </div>
      <div id="info"><table><tr><td>Stark</td><td>Greyjoy</td><td>Lannister</td><td>Martell</td><td>Tyrell</td><td>Baratheon</td></tr><tr><td id="Sinfo"></td><td id="Ginfo"></td><td id="Linfo"></td><td id="Minfo"></td><td id="Tinfo"></td><td id="Binfo"></td></tr></table></div>
    </header>
    
    <div class="info">
    	<div class="gameinfo clearfix">
        	<div class="floatleft">
            	<p>Round: <span id="turn"></span>Phase: <span id="phase"></span>Playing now: <span id="now"></span><p>
                <p>Westeros cards:</p>
                <table id="WCards" width="463" border="1">
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </table>

           	  	<p>Victory:</p>
            	<table width="463" height="70" border="0" id="zamki">
                  <tr align=center>
                    <td width="59"></td>
                    <td width="60"></td>
                    <td width="59"></td>
                    <td width="60"></td>
                    <td width="60"></td>
                    <td width="60"></td>
                    <td width="59"></td>
                  </tr>
                </table>
          </div>
            <div id="bochki" class="floatleft">
            	<table width="337" height="61" border="0">
                  <tr align=center>
                    <td width="39"></td>
                    <td width="46"></td>
                    <td width="39"></td>
                    <td width="45"></td>
                    <td width="40"></td>
                    <td width="43"></td>
                    <td width="39"></td>
                  </tr>
                </table>
          </div>
            <div id="track" class="floatleft">
            	<table width="445" border="0">
                  <tr align=center>
                    <td width="65" height="68"></td>
                    <td width="68"></td>
                    <td width="70"></td>
                    <td width="66"></td>
                    <td width="68"></td>
                    <td width="68"></td>
                  </tr>
                  <tr align=center>
                    <td height="72"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr align=center>
                    <td height="70"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </table>
            </div>
                

      
        
        
        
        </div>
        
   	  	<div id="board">
        	<table width="536" height="72" border="0" id="wildpower">
              <tr align=center>
                <td width="68"></td>
                <td width="70"></td>
                <td width="70"></td>
                <td width="72"></td>
                <td width="70"></td>
                <td width="70"></td>
                <td width="70"></td>
              </tr>
            </table>
            <div id="WildCard"></div>
            <!--lands -->
            <!--north -->
            <div title="CastleBlack" name="1" id="CastleBlack" class="land"> </div>
            <div title="Karhold" name="2" id="Karhold" class="land"> </div>
            <div title="Winterfell" name="3" id="Winterfell" class="land"> </div>
            <div title="StonyShore" name="4" id="StonyShore" class="land"> </div>
            <div title="WhiteHarbor" name="5" id="WhiteHarbor" class="land"> </div>
            <div title="WidowsWatch" name="6" id="WidowsWatch" class="land"> </div>
            <div title="FlintsFinger" name="7" id="FlintsFinger" class="land"> </div>
            <div title="GreywaterWatch" name="8" id="GreywaterWatch" class="land"> </div>
            <div title="MoatCailin" name="9" id="MoatCailin" class="land"> </div>
            <!--mainland -->
            <div title="Seagard" name="10" id="Seagard" class="land"> </div>
            <div title="Twins" name="11" id="Twins" class="land"> </div>
            <div title="Fingers" name="12" id="Fingers" class="land"> </div>
            <div title="MountainsOfMoon" name="13" id="MountainsOfMoon" class="land"> </div>
            <div title="Eyrie" name="14" id="Eyrie" class="land"> </div>
            <div title="Pyke" name="15" id="Pyke" class="land"> </div>
            <div title="Riverrun" name="16" id="Riverrun" class="land"> </div>
            <div title="Lannisport" name="17" id="Lannisport" class="land"> </div>
            <div title="StoneySept" name="18" id="StoneySept" class="land"> </div>
            <div title="Harrenhal" name="19" id="Harrenhal" class="land"> </div>
            <div title="CrackclawPoint" name="20" id="CrackclawPoint" class="land"> </div>
            <div title="Dragonstone" name="21" id="Dragonstone" class="land"> </div>
            <div title="SearoadMarches" name="22" id="SearoadMarches" class="land"> </div>
            <div title="Blackwater" name="23" id="Blackwater" class="land"> </div>
            <div title="KingsLanding" name="24" id="KingsLanding" class="land"> </div>
            <div title="Highgarden" name="25" id="Highgarden" class="land"> </div>
            <div title="Reach" name="26" id="Reach" class="land"> </div>
            <div title="Kingswood" name="27" id="Kingswood" class="land"> </div>
            <div title="StormsEnd" name="28" id="StormsEnd" class="land"> </div>
            <!--south -->
            <div title="DornishMarches" name="29" id="DornishMarches" class="land"> </div>
            <div title="Boneway" name="30" id="Boneway" class="land"> </div>
            <div title="Oldtown" name="31" id="Oldtown" class="land"> </div>
            <div title="ThreeTowers" name="32" id="ThreeTowers" class="land"> </div>
            <div title="PrincesPass" name="33" id="PrincesPass" class="land"> </div>
            <div title="Yronwood" name="34" id="Yronwood" class="land"> </div>
            <div title="Starfall" name="35" id="Starfall" class="land"> </div>
            <div title="Arbor" name="36" id="Arbor" class="land"> </div>
            <div title="Sunspear" name="37" id="Sunspear" class="land"> </div>
            <div title="SaltShore" name="38" id="SaltShore" class="land"> </div>
            <!--water-->
            <!--west-->
            <div title="BayofIce" name="39" id="BayofIce" class="water"> </div>
            <div title="WinterfellPort" name="40" id="WinterfellPort" class="water"> </div>
            <div title="SunsetSea" name="41" id="SunsetSea" class="water"> </div>
            <div title="IronmansBay" name="42" id="IronmansBay" class="water"> </div>
            <div title="PykePort" name="43" id="PykePort" class="water"> </div>
            <div title="GoldenSound" name="44" id="GoldenSound" class="water"> </div>
            <div title="LannisportPort" name="45" id="LannisportPort" class="water"> </div>
            <div title="WestSummerSea" name="46" id="WestSummerSea" class="water"> </div>
            <div title="RedwyneStraghts" name="47" id="RedwyneStraghts" class="water"> </div>
            <div title="OldtownPort" name="48" id="OldtownPort" class="water"> </div>
            <!--east-->
            <div title="ShiveringSea" name="49" id="ShiveringSea" class="water"> </div>
            <div title="NarrowSea" name="50" id="NarrowSea" class="water"> </div>
            <div title="WhiteHarborPort" name="51" id="WhiteHarborPort" class="water"> </div>
            <div title="ShipbreakerBay" name="52" id="ShipbreakerBay" class="water"> </div>
            <div title="DragonstonePort" name="53" id="DragonstonePort" class="water"> </div>
            <div title="BlackwaterBay" name="54" id="BlackwaterBay" class="water"> </div>
            <div title="StormsEndPort" name="55" id="StormsEndPort" class="water"> </div>
            <div title="EastSummerSea" name="56" id="EastSummerSea" class="water"> </div>
            <div title="SunspearPort" name="57" id="SunspearPort" class="water"> </div>
            <div title="SeaOfDorne" name="58" id="SeaOfDorne" class="water"> </div>
           
           	<!--power tokens-->
        	<!--north -->
            <div name="1" id="CastleBlack-token" class="token"> </div>
            <div name="2" id="Karhold-token" class="token"> </div>
            <div name="3" id="Winterfell-token" class="token"> </div>
            <div name="4" id="StonyShore-token" class="token"> </div>
            <div name="5" id="WhiteHarbor-token" class="token"> </div>
            <div name="6" id="WidowsWatch-token" class="token"> </div>
            <div name="7" id="FlintsFinger-token" class="token"> </div>
            <div name="8" id="GreywaterWatch-token" class="token"> </div>
            <div name="9" id="MoatCailin-token" class="token"> </div>
            <!--maintoken -->
            <div name="10" id="Seagard-token" class="token"> </div>
            <div name="11" id="Twins-token" class="token"> </div>
            <div name="12" id="Fingers-token" class="token"> </div>
            <div name="13" id="MountainsOfMoon-token" class="token"> </div>
            <div name="14" id="Eyrie-token" class="token"> </div>
            <div name="15" id="Pyke-token" class="token"> </div>
            <div name="16" id="Riverrun-token" class="token"> </div>
            <div name="17" id="Lannisport-token" class="token"> </div>
            <div name="18" id="StoneySept-token" class="token"> </div>
            <div name="19" id="Harrenhal-token" class="token"> </div>
            <div name="20" id="CrackclawPoint-token" class="token"> </div>
            <div name="21" id="Dragonstone-token" class="token"> </div>
            <div name="22" id="SearoadMarches-token" class="token"> </div>
            <div name="23" id="Blackwater-token" class="token"> </div>
            <div name="24" id="KingsLanding-token" class="token"> </div>
            <div name="25" id="Highgarden-token" class="token"> </div>
            <div name="26" id="Reach-token" class="token"> </div>
            <div name="27" id="Kingswood-token" class="token"> </div>
            <div name="28" id="StormsEnd-token" class="token"> </div>
            <!--south -->
          	<div name="29" id="DornishMarches-token" class="token"> </div>
            <div name="30" id="Boneway-token" class="token"> </div>
            <div name="31" id="Oldtown-token" class="token"> </div>
            <div name="32" id="ThreeTowers-token" class="token"> </div>
            <div name="33" id="PrincesPass-token" class="token"> </div>
            <div name="34" id="Yronwood-token" class="token"> </div>
            <div name="35" id="Starfall-token" class="token"> </div>
            <div name="36" id="Arbor-token" class="token"> </div>
            <div name="37" id="Sunspear-token" class="token"> </div>
            <div name="38" id="SaltShore-token" class="token"> </div>
            
            
            <!--<img src="images/board.jpg" width="1115" height="2231">-->
            
            
            
        </div>
        
        <!--houses info-->
        <div id="SI" class="house">
            <p>Power tokens: <span id="StarkPT"></span><p>
            <div id="Stark-raven" class="raven"></div>
            <div id="Stark-blade" class="blade"></div>
            <ul id="StarkHC">
            	<li><img src="images/house/stark/eddard.jpg" width="98" height="151" alt="Eddard"></li>
                <li><img src="images/house/stark/robb.jpg" width="98" height="151" alt="Robb"></li>
                <li><img src="images/house/stark/roose_bolton.jpg" width="98" height="151" alt="Bolton"></li>
                <li><img src="images/house/stark/greatjon_umber.jpg" width="98" height="151" alt="Umber"></li>
                <li><img src="images/house/stark/ser_rodrick_cassel.jpg" width="98" height="151" alt="Cassel"></li>
                <li><img src="images/house/stark/the_blackfish.jpg" width="98" height="151" alt="Blackfish"></li>
                <li><img src="images/house/stark/catelyn.jpg" width="98" height="151" alt="Catelyn"></li>
            </ul>
            <div id="Stark-throne" class="throne"></div>
        </div>
        <div id="GI" class="house">
            <p>Power tokens: <span id="GreyjoyPT"></span><p>
            <div id="Greyjoy-raven" class="raven"></div>
            <div id="Greyjoy-blade" class="blade"></div>
            <ul id="GreyjoyHC">
            	<li><img src="images/house/greyjoy/euron_crows_eye.jpg" width="98" height="151" alt="Euron"></li>
                <li><img src="images/house/greyjoy/victarion.jpg" width="98" height="151" alt="Victarion"></li>
                <li><img src="images/house/greyjoy/theon.jpg" width="98" height="151" alt="Theon"></li>
                <li><img src="images/house/greyjoy/balon.jpg" width="98" height="151" alt="Balon"></li>
                <li><img src="images/house/greyjoy/asha.jpg" width="98" height="151" alt="Asha"></li>
                <li><img src="images/house/greyjoy/dagmar.jpg" width="98" height="151" alt="Dagmar"></li>
                <li><img src="images/house/greyjoy/aeron_damphair.jpg" width="98" height="151" alt="Aeron"></li>
            </ul>
            <div id="Greyjoy-throne" class="throne"></div>
		</div>
        <div id="LI" class="house">
            <p>Power tokens: <span id="LannisterPT"></span><p>
            <div id="Lannister-raven" class="raven"></div>
            <div id="Lannister-blade" class="blade"></div>
            <ul id="LannisterHC">
            	<li><img src="images/house/lannister/tywin.jpg" width="98" height="151" alt="Tywin"></li>
                <li><img src="images/house/lannister/ser_gregor_clegane.jpg" width="98" height="151" alt="Clegan"></li>
                <li><img src="images/house/lannister/the_hound.jpg" width="98" height="151" alt="Hound"></li>
                <li><img src="images/house/lannister/ser_jaime.jpg" width="98" height="151" alt="Jaime"></li>
                <li><img src="images/house/lannister/tyrion.jpg" width="98" height="151" alt="Tyrion"></li>
                <li><img src="images/house/lannister/ser_kevan.jpg" width="98" height="151" alt="Kevan"></li>
                <li><img src="images/house/lannister/cersei.jpg" width="98" height="151" alt="Cersei"></li>
            </ul>
            <div id="Lannister-throne" class="throne"></div>
        </div>
        <div id="BI" class="house">
            <p>Power tokens: <span id="BaratheonPT"></span><p>
            <div id="Baratheon-raven" class="raven"></div>
            <div id="Baratheon-blade" class="blade"></div>
            <ul id="BaratheonHC">
            	<li><img src="images/house/baratheon/stannis.jpg" width="98" height="151" alt="Stannis"></li>
                <li><img src="images/house/baratheon/renly.jpg" width="98" height="151" alt="Renly"></li>
                <li><img src="images/house/baratheon/ser_davos_seaworth.jpg" width="98" height="151" alt="Davos"></li>
                <li><img src="images/house/baratheon/brienne_of_tarth.jpg" width="98" height="151" alt="Brienne"></li>
                <li><img src="images/house/baratheon/melissandre.jpg" width="98" height="151" alt="Melissandre"></li>
                <li><img src="images/house/baratheon/salladhor_saan.jpg" width="98" height="151" alt="Salladhor Saan"></li>
                <li><img src="images/house/baratheon/patchface.jpg" width="98" height="151" alt="Patchface"></li>
            </ul>
            <div id="Baratheon-throne" class="throne"></div>
        </div>
        <div id="TI" class="house">
            <p>Power tokens: <span id="TyrellPT"></span><p>
            <div id="Tyrell-raven" class="raven"></div>
            <div id="Tyrell-blade" class="blade"></div>
            <ul id="TyrellHC">
            	<li><img src="images/house/tyrell/mace.jpg" width="98" height="151" alt="Mace"></li>
                <li><img src="images/house/tyrell/ser_loras.jpg" width="98" height="151" alt="Loras"></li>
                <li><img src="images/house/tyrell/ser_garlan.jpg" width="98" height="151" alt="Garlan"></li>
                <li><img src="images/house/tyrell/randyll_tarly.jpg" width="98" height="151" alt="Randyll"></li>
                <li><img src="images/house/tyrell/alester_florent.jpg" width="98" height="151" alt="Alester"></li>
                <li><img src="images/house/tyrell/margaery.jpg" width="98" height="151" alt="Margeary"></li>
                <li><img src="images/house/tyrell/queen_of_thorns.jpg" width="98" height="151" alt="Queen"></li>
            </ul>
            <div id="Tyrell-throne" class="throne"></div>
        </div>
        <div id="MI" class="house">
            <p>Power tokens: <span id="MartellPT"></span><p>
            <div id="Martell-raven" class="raven"></div>
            <div id="Martell-blade" class="blade"></div>
            <ul id="MartellHC">
            	<li><img src="images/house/martell/the_red_viper.jpg" width="98" height="151" alt="Red Viper"></li>
                <li><img src="images/house/martell/areoh_hotah.jpg" width="98" height="151" alt="Hotah"></li>
                <li><img src="images/house/martell/obara_sand.jpg" width="98" height="151" alt="Obara"></li>
                <li><img src="images/house/martell/darkstar.jpg" width="98" height="151" alt="Darkstar"></li>
                <li><img src="images/house/martell/nymeria_sand.jpg" width="98" height="151" alt="Nymeria"></li>
                <li><img src="images/house/martell/arianne.jpg" width="98" height="151" alt="Arianne"></li>
                <li><img src="images/house/martell/doran.jpg" width="98" height="151" alt="Doran"></li>
            </ul>
            <div id="Martell-throne" class="throne"></div>
        </div>
        
        <article id="popup" class="article">
            <a id="popupContactClose" href="#">x</a>
            <div id="popupContent">
                
            </div>
            <div id="popupError"></div>
        </article>
        <article id="popup2" class="article">
            <div id="popup2Content">
                
            </div>
            <div id="popup2Error"></div>
        </article>
        <article id="popup3" class="article">
            <div id="popup3Content">
                
            </div>
        </article>
        <div id="backgroundPopup"></div>
    </div>
    
    <div id="Readybutton"></div>
    <div class="clearfix"></div>
    <footer class="footer">
        <div class="copyright">by kolas</div>

        <a class="button mainmenu" href="#">Main menu</a>
    </footer>
</div>
</body>
</html>
