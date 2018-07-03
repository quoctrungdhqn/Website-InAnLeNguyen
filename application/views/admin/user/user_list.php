                <div class="span12">                    
                    <div class="head">
                        <div class="isw-users"></div>
                        <h1>Danh sách người dùng</h1>      
                        <div class="clear"></div>
                    </div>
                    <div class="block-fluid">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table listUsers">
                            <tbody> 
                            <?php foreach($list as $user): ?>                               
                                <tr>                                    
                                    <td width="40">
                                        <a href="#"><img src="<?php echo base_url(); ?><?php echo $user->avatar; ?>" width="30" class="img-polaroid"/></a>
                                    </td>
                                    <td>
                                        <a href="#" class="user"><?php echo $user->lastname . ' ' . $user->firstname ?></a>
                                        <p class="about">
                                            <span class="icon-envelope"></span> <?php echo $user->email; ?><br/>
                                        </p>
                                    </td>
                                    <td width="50">
                                        <p class="about">
                                            <a href="<?php echo base_url(); ?>admin/user/edit/<?php echo $user->id;?>"><span class="icon-pencil"></span></a> 
                                            <!--<a href="<?php echo base_url(); ?>"><span class="icon-envelope"></span></a>--> 
                                            <a href="<?php echo base_url(); ?>admin/user/delete/<?php echo $user->id;?>"><span class="icon-remove"></span></a>                                        
                                        </p>
                                    </td>
                                </tr>                               
                             <?php endforeach; ?>                                  
                            </tbody>
                        </table>
                    </div>
                </div>   