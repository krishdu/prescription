<div class="headings"><!--<img src="images/Briefcase-Medical.png" />-->&nbsp;C/F </div>
    <div class="inner">
        <table>
            <tr><td id="CF" width="100%">

                    <?php
                            $q15 = "select a.VALUE, b.NAME, a.ID from
                                patient_health_details a , patient_health_details_master b
                                where
                                a.ID = b.ID
                                and a.VISIT_ID = '$visit_id'";
                            $rsd1 = mysql_query($q15);

                            while($rs = mysql_fetch_array($rsd1)) {
                                    $name = $rs['NAME'];
                                    $value = $rs['VALUE'];
                                    $id = $rs['ID'];
                    ?>
                    <table>      
                        
                        <tr>
                            <td width="100%" ><?php echo $name; ?></td>
                            <td width="100%" ><input type="text" id="CF_<?php echo $id ?>" style="width: 40px;" class="input_box_small" value="<?php echo $value; ?>" /></td>
                            <td ><input type="button" class="update_row" onclick="updateDeleteCF('<?php echo $id ; ?>',
                                            '<?php echo $visit_id ; ?>','UPDATE')"/>
                            </td> 
                        </tr> 
                       
                    </table> 
            <?php    } ?>
            </td>
            </tr>
            <tr><td width="100%">
                    <table>
                        <tr>
                                <td >
                                        <input style="width: 140px;"  type='text' id='txtCFName'/>
                                </td>
                                <td>
                                        <input style="width: 40px;" type='text' id='txtCFValue'/>
                                </td>	
                                <td>
                                    <input type='button' class="delete_row" onclick="addCF('<?php echo $visit_id ; ?>')"/>
                                </td> 
                        </tr>
                    </table>
                </td>
            </tr>
    </table>



    </div>