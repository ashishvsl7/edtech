<?php

$smsg = '';
$successFullMsg = '';
$successFullMsg1 = "display:none;";

$sql="SELECT * FROM `users` ORDER BY `users`.`uid` ASC";
$result = $mysqli->query($sql);
$resultData = $result->fetch_all();

?>

  <main id="main">



    <!-- ======= Contact Section ======= -->
         <section id="enquiry" class="enquiry">
           <div class="container" data-aos="fade-up">
             <div class="section-title">
               <h3><span class="textColorPurple">All User</span></h3>
             </div>

               <table width="100%">
                   <tr>
                       <th width="40%">User</th>
                       <th width="30%">User Type</th>
                       <th width="30%">User Status</th>
                   </tr>
                   <?php

                   foreach($resultData as $value)
                   {

                       ?>
                       <tr>
                           <td>
                               <?php
                               echo $value[1];
                               ?>
                           </td>
                           <td>
                               <?php
                               if($value[3]=="superadmin"){
                                   echo "Super Admin";
                               }else if($value[3]=="admin"){
                                   echo "Admin";
                               }else if($value[3]=="user"){
                                   echo "User";
                               }
                               ?>
                           </td>
                           <td>
                               <?php
                               if($value[4]=="A"){
                                   ?>
                                   <span style="color: green; font-weight: bold;">
                                       <?php
                                   echo "Active";
                                   ?>
                                       </span>
                               <?php
                               }else{
                                   ?>
                                   <span style="color: red; font-weight: bold;">
                                       <?php
                                       echo "Inactive";
                                       ?>
                                       </span>
                                   <?php
                               }
                               ?>
                           </td>
                       </tr>


                   <?php
                   }


                   ?>

               </table>

           </div>
         </section>
         <!-- End Contact Section -->

  </main>
  <!-- End #main -->
