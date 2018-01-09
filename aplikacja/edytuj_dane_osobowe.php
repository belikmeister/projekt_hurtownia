<html>
	<head>
	<meta charset="utf-8">
	
	<link rel="stylesheet" type="text/css" href="style.css">
		<title>
		Hurtownia WWW
		</title>
	</head>
	
	<body>
<div id="top"><?php
session_start();
include('menu.php');?></div>
<div id="TRESC">
<?php
	
?>
</div>
</body>
</html>



<?php 


$a = trim($_REQUEST['a']); 
$id = trim($_GET['id']); 

if($a == 'edit' and !empty($id)) { 
    /* zapytanie do tabeli */ 
    $wynik = mysql_query("SELECT * FROM test WHERE 
    id='$id'") 
    or die('Błąd zapytania'); 
    /*  
     wyświetlamy wyniki, sprawdzamy, 
     czy zapytanie zwróciło wartość większą od 0 
     */ 
    if(mysql_num_rows($wynik) > 0) { 
         /* odczytujemy zawartość wiersza z tabeli */ 
        $r = mysql_fetch_assoc($wynik); 
        /* wczytujemy dane do formularza */ 
        /*  
        w formularz znajdują się ukryte pola "a" 
        z wartością "save" i pole "id" z wartością 
        zmiennej id 
        */ 
        echo '<form action="index.php" method="post"> 
        <input type="hidden" name="a" value="save" /> 
        <input type="hidden" name="id" value="'.$id.'" /> 
        imię:<br /> 
        <input type="text" name="imie" 
        value="'.$r['imie'].'" /><br />
        e-mail:<br /> 
        <input type="text" name="email" 
        value="'.$r['email'].'" /><br />
        <input type="submit" value="popraw" /> 
        </form>'; 
    } 
} 
elseif($a == 'save') { 
    /* odbieramy zmienne z formularza */ 
    $id = $_POST['id']; 
    $imie = trim($_POST['imie']); 
    $email = trim($_POST['email']); 
    /* uaktualniamy tabelę test */ 
    mysql_query("UPDATE test SET imie='$imie', 
    email='$email' WHERE id='$id'") 
    or die('Błąd zapytania'); 
    echo 'Dane zostały zaktualizowane'; 
} 
?> 

<?php 


$a = trim($_REQUEST['a']); 
$id = trim($_GET['id']); 

if($a == 'edit' and !empty($id)) { 
    /* zapytanie do tabeli */ 
    $wynik = mysql_query("SELECT * FROM test WHERE 
    id='$id'") 
    or die('Błąd zapytania'); 
    /*  
     wyświetlamy wyniki, sprawdzamy, 
     czy zapytanie zwróciło wartość większą od 0 
     */ 
    if(mysql_num_rows($wynik) > 0) { 
         /* odczytujemy zawartość wiersza z tabeli */ 
        $r = mysql_fetch_assoc($wynik); 
        /* wczytujemy dane do formularza */ 
        /*  
        w formularz znajdują się ukryte pola "a" 
        z wartością "save" i pole "id" z wartością 
        zmiennej id 
        */ 
        echo '<form action="index.php" method="post"> 
        <input type="hidden" name="a" value="save" /> 
        <input type="hidden" name="id" value="'.$id.'" /> 
        imię:<br /> 
        <input type="text" name="imie" 
        value="'.$r['imie'].'" /><br />
        e-mail:<br /> 
        <input type="text" name="email" 
        value="'.$r['email'].'" /><br />
        <input type="submit" value="popraw" /> 
        </form>'; 
    } 
} 
elseif($a == 'save') { 
    /* odbieramy zmienne z formularza */ 
    $id = $_POST['id']; 
    $imie = trim($_POST['imie']); 
    $email = trim($_POST['email']); 
    /* uaktualniamy tabelę test */ 
    mysql_query("UPDATE test SET imie='$imie', 
    email='$email' WHERE id='$id'") 
    or die('Błąd zapytania'); 
    echo 'Dane zostały zaktualizowane'; 
} 
?> 