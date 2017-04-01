<?php 
$query  =   $this->db->get('admin_request');
$requestCounter =   0;
foreach($query->result() as $rows){ 
           ?>
                 <li class="messageListHover">
                     <a href="<?php echo base_url().'view_admin_users'; ?>" class="messageListHover" >
                        <?php 
                            $data   =   array('admin_u_id'=>$rows->contributor_id,'admin_access'=>0);
                            $querySender    =   $this->db->get_where('admin_member_information',$data);
                               foreach($querySender->result() as $rowSender){ 
                                 $queryAdminName = $this->db->get_where('admin_member_account',array('admin_id'=>$rowSender->admin_u_id));
                                 foreach($queryAdminName->result() as $adminName){
                                    echo '<div style = "padding: 10%;">'; 
                                    echo $adminName->admin_firstname.' '.$adminName->admin_lastname;
                                    echo '<br/><small style = "color: green; margin: 10%;">Send you a request to enable her/his account.</small>';
                                    echo '</div>';

                                 }
                                } ?>
                     </a>
                 </li>
                 <div class="divider"></div>
 <?php 
       } ?>