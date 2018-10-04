<?php
require_once('/Time.class.php');
class Etudiants {
    private $sex;
    private $nom;
    private $prenom;
    private $email;
    private $password;
    private $age;
    private $photo;
    private $programme;
    private $formation;
    private $commentaire; 

	public function __construct()	//Constructeur
	{
        $this->sex="";
        $this->nom="";
        $this->prenom="";
        $this->email="";
        $this->password="";
        $this->age="";
        $this->photo="";
        $this->programme="";
        $this->formation="";
        $this->commentaire="";
	}	
    
    public function getSex(){ return $this->sex; }
    public function setSex($value){ $this->sex = $value; }

    public function getNom(){ return $this->nom; }
    public function setNom($value){ $this->nom = $value; }

    public function getPrenom(){ return $this->prenom; }
    public function setPrenom($value){ $this->prenom = $value; }

    public function getEmail(){ return $this->email; }
    public function setEmail($value){ $this->email = $value; }

    public function getPassword(){ return $this->password; }
    public function setPassword($value){ $this->password = $value; }

    public function getPhoto(){ return $this->photo; }
    public function setPhoto($value){ $this->photo = $value; }

    public function getProgramme(){ return $this->programme; }
    public function setProgramme($value){ $this->programme = $value; }

    public function getFormation(){ return $this->formation; }
    public function setFormation($value){ $this->formation = $value; }

    public function getCommentaire(){ return $this->commentaire; }
    public function setCommentaire($value){ $this->commentaire = $value; }
    
	
	public function __toString()
	{
        return "Etudiants[".$this->sex.",".$this->nom.",".$this->prenom.",".$this->email.",".$this->password.",".$this->photo.",".$this->programme.",".
        $this->formation.",".$this->commentaire."]";
	}
	public function affiche()
	{
		echo $this->__toString();
	}
	public function loadFromArray($tab)
	{
        //(isset($_GET['query_age']) ? $_GET['query_age'] : null);
        $this->sex = isset($tab["sex"]) ? $tab["sex"] : null;
        $this->nom = isset($tab["nom"]) ? $tab["nom"] : null;
        $this->prenom = isset($tab["prenom"]) ? $tab["prenom"] : null;
        $this->email = isset($tab["mail"]) ? $tab["mail"] : null;
        $this->password = isset($tab["pwd"]) ? $tab["pwd"] : null;
        $this->age = isset($tab["age"]) ? $tab["age"] : null;
        $this->photo = isset($tab["photo"]) ? $tab["photo"] : null;
        $this->programme = isset($tab["programme"]) ? $tab["programme"] : null;
        $this->formation = isset($tab["formation"]) ? $tab["formation"] : null;
        $this->commentaire = isset($tab["commentaire"]) ? $tab["commentaire"] : null;
    }	
    
    public function loadFromFormulaireInscription($tab)
	{
        $this->sex = $tab["sex"];
        $this->nom = $tab["nom"];
        $this->prenom = $tab["prenom"];
        $this->email = $tab["mail"];
        $this->password = $tab["pwd"];
        $this->age = $tab['daten'];
        $this->programme = $tab["prog"];
        $this->formation = $tab["formation"];
        $this->commentaire = $tab["comment"];
    }	
    
	public function loadFromObject($x)
	{
        $this->sex = $x->SEX;
        $this->nom = $x->NOM;
        $this->prenom = $x->PRENOM;
        $this->email = $x->EMAIL;
        $this->password = $x->PASSWORD;
        $this->age = $x->age;
        $this->photo = $x->PHOTO;
        $this->programme = $x->PROGRAMME;
        $this->formation = $x->FORMATION;
        $this->commentaire = $x->COMMENTAIRE;
    }	
    
    public static function etudiantsParProgram($programme)//si il y a une selction autre que 'all' alors on retourne un cusreur precis, si non on retourne tout les etudiants
    {
        $conn = Database::getInstance();
        $query = "SELECT * FROM etudiants";
        if(isset($programme['choix']))
        {
            if($programme['choix'] != "all")
            {
                $query .= " WHERE PROGRAMME=?";
                if ($stmt = $conn->prepare($query)) 
                {
                    /* bind parameters for markers */
                    $stmt->bind_param("s",$programme['choix']);
                }
            }
            else
            {
                $stmt = $conn->prepare($query);
            }
        }
        else
        {
            $stmt = $conn->prepare($query);
        }
        if ($stmt) 
        {
             /* execute query */
             $stmt->execute();
                
            $result = $stmt->get_result();
            $stmt->close();
        }
        $conn = null;
        return $result;
    }

        
    public static function etudiantsPrecis($id)//si il y a une selction autre que 'all' alors on retourne un cusreur precis, si non on retourne tout les etudiants
    {
            $query = "SELECT * FROM etudiants WHERE ID=?";
            $conn = Database::getInstance();
            if ($stmt = $conn->prepare($query)) 
            {
                /* bind parameters for markers */
                $stmt->bind_param("s",$id['etudiant_choisi']);
                $stmt->execute();
                
                $result = $stmt->get_result();
                $stmt->close();

                $conn = null;
                return $result;
            }
    }

    public static function verifierSiEtudiantChoisit($id)
    {
        if(isset($id['etudiant_choisi']))
        {
            return true;
        }
        return false;
    }

    public static function produireColonneTableau($result,$tr_attributs,$td_attributs,$surrounding_opening_tags,$surrounding_closing_tags)
    {
        while($etudiants = $result->fetch_object())
        {
        $tr_attributs = ' scope="row" onclick="location.href=\'pageEtudiantsInscrits.php?etudiant_choisi='.$etudiants->ID.'\';"';
        echo     
        $surrounding_opening_tags.                       
        '<tr'.$tr_attributs.'>
        <td'.$td_attributs.'>'.$etudiants->NOM.'</td>
        <td'.$td_attributs.'>'.$etudiants->PRENOM.'</td>
        <td'.$td_attributs.'>'.$etudiants->EMAIL.'</td>
        <td'.$td_attributs.'>'.$etudiants->PASSWORD.'</td>
        <td'.$td_attributs.'>'.Time::getDifference($etudiants->AGE).'</td>
        </tr>'.$surrounding_closing_tags;
        }
    }

    public static function otenirUnEtudiantPrecis($result,$tr_attributs,$td_attributs,$surrounding_opening_tags,$surrounding_closing_tags)
    {
        if($etudiants = $result->fetch_object())
        {
        $tr_attributs = ' scope="row"';
        echo     
        $surrounding_opening_tags.                       
        '<tr'.$tr_attributs.'>
        <td'.$td_attributs.'><img src=\'./uploads/'.$etudiants->PHOTO.'\'></td>
        <td'.$td_attributs.'>'.$etudiants->NOM.'</td>
        <td'.$td_attributs.'>'.$etudiants->PRENOM.'</td>
        <td'.$td_attributs.'>'.$etudiants->EMAIL.'</td>
        <td'.$td_attributs.'>'.$etudiants->PASSWORD.'</td>
        <td'.$td_attributs.'>'.Time::getDifference($etudiants->AGE).'</td>
        <td'.$td_attributs.'>'.$etudiants->PROGRAMME.'</td>
        <td'.$td_attributs.'>'.$etudiants->COMMENTAIRE.'</td>
        <td'.$td_attributs.'>'.$etudiants->FORMATION.'</td>
        <td'.$td_attributs.'>'.$etudiants->SEX.'</td>
        </tr>'.$surrounding_closing_tags;
        }
    }

    public function inscrireEtudiant()
    {
        $query = "INSERT INTO etudiants 
        (NOM, PRENOM, EMAIL, PASSWORD, AGE, PROGRAMME, FORMATION, COMMENTAIRE, SEX) 
        VALUES (?,?,?, ?,?,? ,?,?,?)";
        $conn = Database::getInstance();
        if ($stmt = $conn->prepare($query)) 
        {
            /* bind parameters for markers */
            $stmt->bind_param("sssssssss",$this->nom,$this->prenom,$this->email,$this->password,$this->age,$this->programme,$this->formation,$this->commentaire,$this->sex);
            $stmt->execute();
            $stmt->close();

            $conn = null;
        }
    }
}
