<?php


// login functions


function login_check($username, $password){
    session_start();
    if(isset($_SESSION['login_rejected']))
        unset($_SESSION['login_rejected']);

    $cnx = mysqli_connect('localhost', 'root','', 'get_job'); 
    if(!$cnx){
        die("Connection Failed: ".mysqli_connect_error());
    }
    $query = 'SELECT `id`,`username`,`password`,`role` FROM user';
    $rs = mysqli_query($cnx,$query);
    while($row = mysqli_fetch_assoc($rs)){
        if($row['username'] == $username && $row['password'] == $password){
            $_SESSION['id'] = $row['id'];                
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];
            return true;
        }
    }
    $_SESSION['login_rejected'] = 'true';
    return false;
}

// function used to echo a class for input to add propreties to it

function echo_inpt_wrong(){
    session_start();
    if(isset($_SESSION['login_rejected'])){
        if($_SESSION['login_rejected'] == 'true')
            return 'utilisateur ou le mot de passe incorect';
        else
            return '';
    }

}

// jobs list funtion 
function get_jobs_lengh(){
    $cnx = mysqli_connect('localhost', 'root','', 'get_job'); 
    if(!$cnx){
        die("Connection Failed: ".mysqli_connect_error());
    }
    $query = "SELECT count(*) AS nbr_jobs FROM job_list";
    $rs = mysqli_query($cnx, $query);
    return mysqli_fetch_assoc($rs)['nbr_jobs'];
}
function format_date_jmy($date){
    $formattedDate = date('j M Y', strtotime($date));
    return $formattedDate; // Outputs "15 Feb 2023"

}

function get_company_name($id){
    $cnx = mysqli_connect('localhost', 'root','', 'get_job'); 
    if(!$cnx){
        die("Connection Failed: ".mysqli_connect_error());
    }
    $query = "SELECT `name` FROM company WHERE id = $id";
    $rs = mysqli_query($cnx, $query);
    return mysqli_fetch_assoc($rs)['name'];
}
function get_company_city($id){
    $cnx = mysqli_connect('localhost', 'root','', 'get_job'); 
    if(!$cnx){
        die("Connection Failed: ".mysqli_connect_error());
    }
    $query = "SELECT `city` FROM company WHERE id = $id";
    $rs = mysqli_query($cnx, $query);
    return mysqli_fetch_assoc($rs)['city'];
}

function diff_current_public($date){
    $current_date = new DateTime();
    $diff = $current_date->diff(new DateTime($date));
    $days = $diff->days;
    if($days == 0)
        return 'aujourd\'huit';
    else 
        return $days.' jours';
}

function diff_current_limit($date){
    $current_date = date('Y-m-d');
    if($current_date > $date )
        return array(true,'Expire');
    else
        return array(false, '');
}
function echo_jobs_list(){
    $cnx = mysqli_connect('localhost', 'root','', 'get_job'); 
    if(!$cnx){
        die("Connection Failed: ".mysqli_connect_error());
    }
    $query = "SELECT * FROM job_list ORDER BY date_public DESC";
    $rs = mysqli_query($cnx, $query);
    while($row = mysqli_fetch_assoc($rs)){
        echo'
        <div class="poste v-box">
        <p class="expired">'.diff_current_limit($row['date_limit'])[1].'</p>
        <div class="v-box entr">
            <h1>'.get_company_name($row['id_company']).'</h1>
            <span>entreprise</span>
        </div>
        <div class="h-box info">
            <div class="v-box grade">
                <h3>'.$row['poste'].'</h3>
                <span>Poste</span>
            </div>
            <div class="v-box city">
                <h3>'.get_company_city($row['id_company']).'</h3>
                <span>ville</span>
            </div>
            <div class="v-box salary">
                <h3>'.$row['salary'].' DH</h3>
                <span>salaire</span>
            </div>
            <div class="v-box date">
                <h3>'.format_date_jmy($row['date_limit']).'</h3>
                <span>date limite</span>
            </div>
        </div>
        <div class="bot-bar h-box flex-space-between">
            <span>publier '.diff_current_public($row['date_public']).'</span>
            <a href="" class="poste-link h-box flex-align-center">
                <i class="fa-solid fa-circle-info"></i>
                <span>Detail</span>
            </a>
        </div>
        </div>            
        ';   
    }
}
function echo_jobs_list_by_search($seach){
    $cnx = mysqli_connect('localhost', 'root','', 'get_job'); 
    if(!$cnx){
        die("Connection Failed: ".mysqli_connect_error());
    }
    $query = "SELECT * FROM job_list j, company c WHERE j.id_company=c.id AND c.name LIKE '%{$seach}%' ORDER BY date_public DESC";
    $rs = mysqli_query($cnx, $query);
    if($rs->num_rows != 0){
        while($row = mysqli_fetch_assoc($rs)){
            echo'
            <div class="poste v-box">
            <p class="expired">'.diff_current_limit($row['date_limit'])[1].'</p>
            <div class="v-box entr">
                <h1>'.get_company_name($row['id_company']).'</h1>
                <span>entreprise</span>
            </div>
            <p class="expire"><p>
            <div class="h-box info">
                <div class="v-box grade">
                    <h3>'.$row['poste'].'</h3>
                    <span>Poste</span>
                </div>
                <div class="v-box city">
                    <h3>'.get_company_city($row['id_company']).'</h3>
                    <span>ville</span>
                </div>
                <div class="v-box salary">
                    <h3>'.$row['salary'].' DH</h3>
                    <span>salaire</span>
                </div>
                <div class="v-box date">
                    <h3>'.format_date_jmy($row['date_limit']).'</h3>
                    <span>date limite</span>
                </div>
            </div>
            <div class="bot-bar h-box flex-space-between">
                <span>publier '.diff_current_public($row['date_public']).'</span>
                <a href="" class="poste-link h-box flex-align-center">
                    <i class="fa-solid fa-circle-info"></i>
                    <span>Detail</span>
                </a>
            </div>
            </div>            
            ';   
        }
    }
    else{
        echo'
        <div class="fetch-empty">Aucun poste trouve</div>
        ';
    }
}
function notify_not_seen($seen){
    if($seen == 'false')
        return 'not-seen';
}

function echo_notification($id){
    $cnx = mysqli_connect('localhost', 'root','', 'get_job'); 
    if(!$cnx){
        die("Connection Failed: ".mysqli_connect_error());
    }
    $query = "SELECT * FROM `notification` WHERE id_recipient = $id ORDER BY date_send DESC";
    $rs = mysqli_query($cnx, $query);
    while($row = mysqli_fetch_assoc($rs)){
        echo'
        <a href="" class="notify-link">
        <h1 class="'.notify_not_seen($row['seen']).'"></h1>
        <p>'.$row['message'].'</p>
        <span>'.get_company_name($row['id_sender']).'</span>
        </a>        
        ';
    }
}



















function upload_file_condidate($pdf_file, $id){
    // Get the uploaded file
    $file = $_FILES[$pdf_file]['tmp_name'];

    // Read the file contents
    $pdf_data = file_get_contents($file);

    // Open a database connection
    $cnx = mysqli_connect('localhost', 'root','', 'get_job'); 

    if(!$cnx){
        die("Connection Failed: ".mysqli_connect_error());
    }

    // Prepare the INSERT query
    $query = "UPDATE condidate SET cv = ? WHERE id = ?";
    $stmt = mysqli_prepare($cnx, $query);



    // Bind the PDF data parameter to the query
    mysqli_stmt_bind_param($stmt, 'si', $pdf_data, $id);
    // Execute the query
    mysqli_stmt_execute($stmt);
}

























// condidate funtions
function printInfoCondidateById($id){
    $cnx = mysqli_connect('localhost', 'root','', 'get_job'); 

    if(!$cnx){
        die("Connection Failed: ".mysqli_connect_error());
    }
    $cmd = "SELECT * FROM condidate WHERE id_user = $id";
    $rs = mysqli_query($cnx, $cmd);
    if(mysqli_num_rows($rs) > 0){
        while($row = mysqli_fetch_assoc($rs)){
            echo'
            <form action="Process/modifyCond.php" method="post" enctype="multipart/form-data">
            <div class="cond v-box">
                <input type="text" value='.$row['id'].' name="id_cond" style="display: none;">
                <div class="section h-box flex-space-between">
                    <div class="left">Personnel Informations</div>
                    <div class="right v-box">
                        <label for="">Nom</label>
                        <input size="30" type="text" name="first_name" id="" placeholder="'.$row['first_name'].'" value = "'.$row['first_name'].'">
                        <label for="">Prenom</label>
                        <input type="text" name="last_name" id="" placeholder="'.$row['last_name'].'"value = "'.$row['last_name'].'">
                        <label for="">cin</label>
                        <input type="text" name="cin" id="" placeholder="'.$row['cin'].'"value = "'.$row['cin'].'">
                        <label for="">Telephone</label>
                        <input type="text" placeholder="'.$row['phone'].'" value="'.$row['phone'].'" name="phone">
                        <label for="">Etat</label>
                        <div class="h-box">
                            <input type="radio" name="etat" value="maried" '.checkMaried($row['id']).'>
                            <label for="">Marier</label>
                            <input type="radio" name="etat" value="nomaried" '.checkNoMaried($row['id']).'>
                            <label for="">Celibataire</label>
                        </div>
                    </div>
                </div>
                <div class="section h-box flex-space-between">
                    <div class="left">Formation</div>
                    <div class="right v-box">
                        <label for="">Diplome</label>
                        <input size="30" type="text" name="diplome" id="" placeholder="'.$row['diplome'].'"value = "'.$row['diplome'].'">
                        <label for="">Specialite</label>
                        <input type="text" name="specialite" id="" placeholder="'.$row['specialite'].'"value = "'.$row['specialite'].'">
                        <label for="">Experience</label>
                        <textarea name="experience" id="" rows="5" placeholder="Experience">'.$row['experience'].'</textarea>
                    </div>
                </div>
                <div class="section h-box flex-space-between">
                    <div class="left">CV</div>
                    <div class="right v-box flex-align-center">
                        <a href="Process/CV.php?id='.$row['id'].'" target="_blank"class="link-nod current-link"><i class="fa-sharp fa-solid fa-newspaper"></i></a>
                        <p>changer le Cv</p>
                        <input  type="file" name="cv" style="width: 200px;">
                    </div>
                </div>
                <div class="btn-input section h-box flex-justify-center "style="column-gap:10px;">
                    <a href="./Process/deleteCond.php?id_cond='.$row['id'].'" class="link-nod">Supprimer</a>
                    <input type="submit" value="Modier">
                </div>
            </div>
        </form>
            
            ';
        }
    }
    else{
        echo'
            <p class="messg">Aucun condidature trouve</p>
        ';
    }
}

function checkMaried($id){
    $cnx = mysqli_connect('localhost', 'root','', 'get_job'); 

    if(!$cnx){
        die("Connection Failed: ".mysqli_connect_error());
    }
    $cmd = "SELECT etat FROM condidate WHERE id = $id";
    $rs = mysqli_query($cnx,$cmd);
    $status = mysqli_fetch_assoc($rs)['etat'];
    if($status == 'maried') return 'checked';
}
function checkNoMaried($id){
    $cnx = mysqli_connect('localhost', 'root','', 'get_job'); 

    if(!$cnx){
        die("Connection Failed: ".mysqli_connect_error());
    }
    $cmd = "SELECT etat FROM condidate WHERE id = $id";
    $rs = mysqli_query($cnx,$cmd);
    $status = mysqli_fetch_assoc($rs)['etat'];
    if($status == 'nomaried') return 'checked';
}


function deleteCondidateById($id){
    $cnx = mysqli_connect('localhost', 'root','', 'get_job'); 

    if(!$cnx){
        die("Connection Failed: ".mysqli_connect_error());
    }
    $cmd = "DELETE FROM condidate WHERE id = $id";
    mysqli_query($cnx, $cmd);
}



function addCondidateById($id,$array){
    $cnx = mysqli_connect('localhost', 'root','', 'get_job'); 

    if(!$cnx){
        die("Connection Failed: ".mysqli_connect_error());
    }
    $cmd="INSERT INTO condidate(id_user,first_name,last_name,cin,phone,diplome,specialite,experience,etat) VALUES(?,?,?,?,?,?,?,?,?)"; 
    $stmt = mysqli_prepare($cnx,$cmd);
    mysqli_stmt_bind_param($stmt,"issssssss",$id,$array['first_name'],$array['last_name'],$array['cin'],$array['phone'],$array['diplome'],$array['specialite'],$array['experience'],$array['etat']);
    mysqli_stmt_execute($stmt);
}


function modifyCondidate($rs, $id){
    $cnx = mysqli_connect('localhost', 'root','', 'get_job'); 

    if(!$cnx){
        die("Connection Failed: ".mysqli_connect_error());
    }
    $cmd = "UPDATE condidate SET `first_name` = ?, `last_name` = ?, `cin`=?,`phone`=?,`diplome`=?, `specialite`=?, `experience`=?,`etat`=? WHERE id = ?";
    $stmt = mysqli_prepare($cnx, $cmd);
    mysqli_stmt_bind_param($stmt ,"ssssssssi",$rs['first_name'], $rs['last_name'],$rs['cin'],$rs['phone'] ,$rs['diplome'], $rs['specialite'],$rs['experience'],$rs['etat'],$id);
    mysqli_stmt_execute($stmt);
    if($_FILES['cv']['size'] != 0)
        upload_file_condidate('cv',$id);
}