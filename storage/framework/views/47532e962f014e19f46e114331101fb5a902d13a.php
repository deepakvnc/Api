<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <style>
   input[type="checkbox"] {
  visibility: hidden;
}
label {
  cursor: pointer;
}
input[type="checkbox"] + label:before {
  border: 1px solid #333;
  content: "\00a0";
  display: inline-block;
  font: 16px/1em sans-serif;
  height: 16px;
  margin: 0 .25em 0 0;
  padding: 0;
  vertical-align: top;
  width: 16px;
}
input[type="checkbox"]:checked + label:before {
  background: #fff;
  color: #333;
  content: "\2713";
  text-align: center;
  font-weight: bold;
}
input[type="checkbox"]:checked + label:after {
  font-weight: bold;
}

input[type="checkbox"]:focus + label::before {
    outline: rgb(59, 153, 252) auto 5px;
}
</style>
</head>
<body>
<div style="border: solid 2px rgb(14, 14, 14);margin: 25px;">
<div class="row" style="    border: solid 2px;margin: -2px;padding: 10px;background-color: rgb(255, 255, 255);">
  <div class="col-sm-4"> <span style="font-weight: bold;">Wo number :</span> <span><?php echo e($diagnosis[0]->wo_number); ?></span> </div>
  <div class="col-sm-4"><span style="font-weight: bold;">Complaint Number : </span> <span><?php echo e($diagnosis[0]->complaint_number); ?></span> </div>
  <div class="col-sm-4"><span style="font-weight: bold;">Mechanic  :</span> <span> <?php echo e($diagnosis[0]->first_name." ".$diagnosis[0]->surname_prefix." ".$diagnosis[0]->surname); ?></span></div>
</div>
<div class="row" style="border: solid 2px;margin: -2px;padding: 10px;background-color: rgb(204, 204, 204);">
<div class="col-sm-12"> 
<span style="font-weight: bold;"> Customer Complaint :</span>  <?php echo e($diagnosis[0]->complaint_customer); ?>

</div>
</div>
<div class="row" style="    border: solid 2px;margin: -2px;padding: 10px;background-color: rgb(255, 255, 255);">
    <div class="col-sm-4"> <span style="font-weight: bold;">Complaint reproducible ?</span>
        <?php if($diagnosis[0]->complaint_callable == 1): ?>
        <input type="checkbox" id="complaint_yes" name="complaint_yes" value="complaint_yes" checked>
        <label for="complaint_yes"> Yes</label> 
        <input type="checkbox" id="complaint_no" name="complaint_no" value="complaint_no">
        <label for="complaint_no"> No</label>
            
        <?php elseif($diagnosis[0]->complaint_callable == 0): ?>
        <input type="checkbox" id="complaint_yes" name="complaint_yes" value="complaint_yes">
        <label for="complaint_yes"> Yes</label> 
        <input type="checkbox" id="complaint_no" name="complaint_no" value="complaint_no" checked>
        <label for="complaint_no"> No</label>
        <?php endif; ?>
    
    </div>
    <div class="col-sm-4"><span style="font-weight: bold;">Emergency mode ?</span> 
        
        <?php if($diagnosis[0]->emergency_mode == 1): ?>
        
        <input type="checkbox" id="emergency_yes" name="emergency_yes" value="emergency_yes" checked>
        <label for="emergency_yes"> Yes</label> 
        <input type="checkbox" id="emergency_no" name="emergency_no" value="emergency_no">
        <label for="emergency_no"> No</label>
            
        <?php elseif($diagnosis[0]->emergency_mode == 0): ?>
        
        <input type="checkbox" id="emergency_yes" name="emergency_yes" value="emergency_yes">
        <label for="emergency_yes"> Yes</label> 
        <input type="checkbox" id="emergency_no" name="emergency_no" value="emergency_no" checked>
        <label for="emergency_no"> No</label>
        <?php endif; ?>
     </div>
    <div class="col-sm-4"><span style="font-weight: bold;">Mil on ?  :</span>
        <?php if($diagnosis[0]->mil_on == 1): ?>
        <input type="checkbox" id="mil_yes" name="mil_yes" value="mil_yes" checked>
        <label for="mil_yes"> Yes</label> 
        <input type="checkbox" id="mil_no" name="mil_no" value="mil_no">
        <label for="mil_no"> No</label>
            
        <?php elseif($diagnosis[0]->mil_on == 0): ?>
        <input type="checkbox" id="mil_yes" name="mil_yes" value="mil_yes">
        <label for="mil_yes"> Yes</label> 
        <input type="checkbox" id="mil_no" name="mil_no" value="mil_no" checked>
        <label for="mil_no"> No</label>
        <?php endif; ?>
    </div>
  </div>
  <div class="row" style="border: solid 2px;margin: -2px;padding: 10px;background-color: rgb(255, 255, 255);">
    <div class="col-sm-12"> 
    <span style="font-weight: bold;"> Function Checks :</span>  NA
    </div>
    </div>
    <div  style="border: solid 2px;margin: -2px;">
       <div class="row" style="margin: 1px;  padding-left: 13px;padding-top: 5px; background-color: rgb(234, 234, 234);">
        <div class="col-sm-4" style=" border-style: solid; border-right-color: white; border-left-color: rgb(234, 234, 234);border-top-color: rgb(234, 234, 234);border-bottom-color: rgb(234, 234, 234);"> 
        <span> Complaint mechanic </span>  
        </div>
        <div class="col-sm-8"> 
        </div>
        </div>
        <div class="row" style="margin: 1px;  padding-left: 13px;padding-top: 5px; background-color: rgb(rgb(255, 255, 255));">
        <div class="col-sm-4" > 
        <span> Product features ? </span>  
        </div>
         <div class="col-sm-8"> 
            <?php if($diagnosis[0]->product_feature == 1): ?>
            <input type="checkbox" id="product_yes" name="product_yes" value="product_yes" checked>
            <label for="product_yes"> Yes</label> 
            <input type="checkbox" id="product_no" name="product_no" value="product_no">
            <label for="product_no"> No</label>
            <?php elseif($diagnosis[0]->product_feature == 0): ?>
            <input type="checkbox" id="product_yes" name="product_yes" value="product_yes">
            <label for="product_yes"> Yes</label> 
            <input type="checkbox" id="product_no" name="product_no" value="product_no" checked>
            <label for="product_no"> No</label>
            <?php endif; ?>
        </div>
        </div>
        <div class="row" style="margin: 1px;  padding-left: 13px;padding-top: 5px; background-color: rgb(234, 234, 234);">
            <div class="col-sm-4" style=" border-style: solid; border-right-color: white; border-left-color: rgb(234, 234, 234);border-top-color: rgb(234, 234, 234);border-bottom-color: rgb(234, 234, 234);"> 
            <span>Intakeprotocol executed</span>  
            </div>
            <div class="col-sm-8"> 
                <?php if($diagnosis[0]->product_feature == 0): ?>
                <input type="checkbox" id="intakeprotocol_yes" name="intakeprotocol_yes" value="intakeprotocol_yes">
                <label for="intakeprotocol_yes"> Yes</label>
                <input type="checkbox" id="intakeprotoco_lno" name="intakeprotoco_lno" value="intakeprotoco_lno">
                <label for="intakeprotoco_lno"> No</label>
                <input type="checkbox" id="intakeprotocol_na" name="intakeprotocol_na" value="intakeprotocol_na" checked>
                <label for="intakeprotocol_na"> NA</label>
        
                <?php elseif($diagnosis[0]->product_feature == 1): ?>
                <input type="checkbox" id="intakeprotocol_yes" name="intakeprotocol_yes" value="intakeprotocol_yes">
                <label for="intakeprotocol_yes"> Yes</label>
                <input type="checkbox" id="intakeprotoco_lno" name="intakeprotoco_lno" value="intakeprotoco_lno" checked>
                <label for="intakeprotoco_lno"> No</label>
                <input type="checkbox" id="intakeprotocol_na" name="intakeprotocol_na" value="intakeprotocol_na">
                <label for="intakeprotocol_na"> NA</label>
        
                <?php elseif($diagnosis[0]->product_feature == 2): ?>
                <input type="checkbox" id="intakeprotocol_yes" name="intakeprotocol_yes" value="intakeprotocol_yes" checked>
                <label for="intakeprotocol_yes"> Yes</label>
                <input type="checkbox" id="intakeprotoco_lno" name="intakeprotoco_lno" value="intakeprotoco_lno">
                <label for="intakeprotoco_lno"> No</label>
                <input type="checkbox" id="intakeprotocol_na" name="intakeprotocol_na" value="intakeprotocol_na">
                <label for="intakeprotocol_na"> NA</label>
                    
                <?php endif; ?>
            
            </div>
            </div>
            <div class="row" style="margin: 1px;  padding-left: 13px;padding-top: 5px; background-color: rgb(rgb(255, 255, 255));">
            <div class="col-sm-4" > 
            <span>Voltage sustain</span>  
            </div>
             <div class="col-sm-8"> 
                <?php if($diagnosis[0]->voltage_sustain == 0): ?>
                <input type="checkbox" id="voltage_yes" name="voltage_yes" value="voltage_yes" >
                <label for="voltage_yes"> Yes</label>
                <input type="checkbox" id="voltage_no" name="voltage_no" value="voltage_no">
                <label for="voltage_no"> No</label>
                <input type="checkbox" id="voltage_na" name="voltage_na" value="voltage_na" checked>
                <label for="voltage_na"> NA</label>
                <?php elseif($diagnosis[0]->voltage_sustain == 1): ?>
                <input type="checkbox" id="voltage_yes" name="voltage_yes" value="voltage_yes">
                <label for="voltage_yes"> Yes</label>
                <input type="checkbox" id="voltage_no" name="voltage_no" value="voltage_no" checked>
                <label for="voltage_no"> No</label>
                <input type="checkbox" id="voltage_na" name="voltage_na" value="voltage_na">
                <label for="voltage_na"> NA</label>
                <?php elseif($diagnosis[0]->voltage_sustain == 2): ?>
                <input type="checkbox" id="voltage_yes" name="voltage_yes" value="voltage_yes" checked>
                <label for="voltage_yes"> Yes</label>
                <input type="checkbox" id="voltage_no" name="voltage_no" value="voltage_no">
                <label for="voltage_no"> No</label>
                <input type="checkbox" id="voltage_na" name="voltage_na" value="voltage_na">
                <label for="voltage_na"> NA</label>
                <?php endif; ?>
            </div>
            </div>
            <div class="row" style="margin: 1px;  padding-left: 13px;padding-top: 5px; background-color: rgb(234, 234, 234);">
                <div class="col-sm-4" style=" border-style: solid; border-right-color: white; border-left-color: rgb(234, 234, 234);border-top-color: rgb(234, 234, 234);border-bottom-color: rgb(234, 234, 234);"> 
                <span> Error code(CCV 12) </span>  
                </div>
                <div class="col-sm-8"> 
                    <input type="checkbox" id="error_yes" name="error_yes" value="error_yes">
                    <label for="error_yes"> Yes</label>
                    <input type="checkbox" id="error_no" name="error_no" value="error_no">
                    <label for="error_no"> No</label>
                    <input type="checkbox" id="error_na" name="error_na" value="error_na">
                    <label for="error_na"> NA</label>
                </div>
                </div>
                <div class="row" style="margin: 1px;  padding-left: 13px;padding-top: 5px; background-color: rgb(rgb(255, 255, 255));">
                <div class="col-sm-4" > 
                <span> Tips (CCV11) </span>  
                </div>
                 <div class="col-sm-8"> 
                    <input type="checkbox" id="tips_yes" name="tips_yes" value="tips_yes">
                    <label for="tips_yes"> Yes</label> 
                    <input type="checkbox" id="tips_no" name="tips_no" value="tips_no">
                    <label for="tips_no"> No</label>
                </div>
                </div>
                <div class="row" style="margin: 1px;  padding-left: 13px;padding-top: 5px; background-color: rgb(234, 234, 234);">
                    <div class="col-sm-4" style=" border-style: solid; border-right-color: white; border-left-color: rgb(234, 234, 234);border-top-color: rgb(234, 234, 234);border-bottom-color: rgb(234, 234, 234);"> 
                    <span> Provisional conclusion
                    </span>  
                    </div>
                    <div class="col-sm-8"> 
                       
                    </div>
                    </div>
                   
                 </div>

     <div  style="border: solid 2px;margin: -2px;">
        <div class="row" style="margin: 1px;  padding-left: 13px;padding-top: 5px; background-color: rgb(204, 204, 204);">
         <div class="col-sm-3" style=" border-style: solid; border-right-color: white; border-left-color: rgb(204, 204, 204);border-top-color: rgb(204, 204, 204);border-bottom-color: rgb(204, 204, 204);"> 
         <span style="font-weight: bold;"> Cause </span>  
         </div>
         <div class="col-sm-9"> 
            
         </div>
         </div>
         <div class="row" style="margin: 1px;  padding-left: 13px;padding-top: 5px; background-color: rgb(204, 204, 204);">
            <div class="col-sm-3" style=" border-style: solid; border-right-color: white; border-left-color: rgb(204, 204, 204);border-top-color: rgb(204, 204, 204);border-bottom-color: rgb(204, 204, 204);"> 
            <span style="font-weight: bold;">Solution /repair advice </span>  
            </div>
            <div class="col-sm-9"> 
               
            </div>
            </div>
         </div>

         <div class="row" style="border: solid 2px;margin: -2px;padding: 7px;background-color: rgb(255, 255, 255);">
            <div class="col-sm-8"> 
            <span style="font-weight: bold;"> Exit Protocol(CV 12)</span>  
            </div>
            <div class="col-sm-4" style="text-align: end;"> 
                <input type="checkbox" id="exit_yes" name="exit_yes" value="exit_yes">
                <label for="exit_yes"> Yes</label>
                <input type="checkbox" id="exit_no" name="exit_no" value="exit_no">
                <label for="exit_no"> No</label>
                <input type="checkbox" id="exit_na" name="exit_na" value="exit_na">
                <label for="exit_na"> NA</label>
            </div>
            </div>
            
            <div class="row" style="border: solid 2px;margin: -2px;padding: 7px;background-color: rgb(204, 204, 204);">
                <div class="col-sm-8" style=" border-style: solid; border-right-color: white; border-left-color: rgb(204, 204, 204);border-top-color: rgb(204, 204, 204);border-bottom-color: rgb(204, 204, 204);"> 
                <span style="font-weight: bold;">CAC Case created?</span>  
                </div>
                <div class="col-sm-4" style="text-align: end;"> 
                    <input type="checkbox" id="cac_yes" name="cac_yes" value="cac_yes">
                    <label for="cac_yes"> Yes</label>
                    <input type="checkbox" id="cac_no" name="cac_no" value="cac_no">
                    <label for="cac_no"> No</label>
                    <input type="checkbox" id="cac_na" name="cac_na" value="cac_na">
                    <label for="cac_na"> NA</label>
                </div>
                </div>
                <div  style="border: solid 2px;margin: -2px;">
                    <div class="row" style="margin: 1px;  padding-left: 13px;padding-top: 5px; ">
                    <div class="col-sm-2"> 
                    <span style="font-weight: bold;"> Bottomplate disassembled ?
                    </span>  
                    </div>
                    <div class="col-sm-4" > 
                        <input type="checkbox" id="bottomplate_yes" name="bottomplate_yes" value="bottomplate_yes">
                        <label for="bottomplate_yes"> Yes</label>
                        <input type="checkbox" id="bottomplate_no" name="bottomplate_no" value="bottomplate_no">
                        <label for="bottomplate_no"> No</label>
                        <input type="checkbox" id="bottomplate_na" name="bottomplate_na" value="bottomplate_na">
                        <label for="bottomplate_na"> NA</label>
                    </div>
                    <div class="col-sm-2"> 
                        <span style="font-weight: bold;"> Ground disassembled ?</span>  
                        </div>
                        <div class="col-sm-4" > 
                            <input type="checkbox" id="ground_yes" name="ground_yes" value="ground_yes">
                            <label for="ground_yes"> Yes</label>
                            <input type="checkbox" id="ground_no" name="ground_no" value="ground_no">
                            <label for="ground_no"> No</label>
                            <input type="checkbox" id="ground_na" name="ground_na" value="ground_na">
                            <label for="ground_na"> NA</label>
                        </div>
                    </div>


                    <div class="row" style="margin: 1px;  padding-left: 13px;padding-top: 5px; ">
                        <div class="col-sm-2"> 
                        <span style="font-weight: bold;"> Engine Cleaned ?
                        </span>  
                        </div>
                        <div class="col-sm-4" > 
                            <input type="checkbox" id="engine_yes" name="engine_yes" value="engine_yes">
                            <label for="engine_yes"> Yes</label>
                            <input type="checkbox" id="engine_no" name="engine_no" value="engine_no">
                            <label for="engine_no"> No</label>
                            <input type="checkbox" id="engine_na" name="engine_na" value="engine_na">
                            <label for="engine_na"> NA</label>
                        </div>
                        <div class="col-sm-2"> 
                            <span style="font-weight: bold;">Keep Parts ? </span>  
                            </div>
                            <div class="col-sm-4" > 
                                <input type="checkbox" id="keep_yes" name="keep_yes" value="keep_yes">
                                <label for="keep_yes"> Yes</label>
                                <input type="checkbox" id="keep_no" name="keep_no" value="keep_no">
                                <label for="keep_no"> No</label>
                                <input type="checkbox" id="keep_na" name="keep_na" value="keep_na">
                                <label for="keep_na"> NA</label>
                            </div>
                        </div>
                        <div class="row" style="margin: 1px;  padding-left: 13px;padding-top: 5px;background-color: rgb(204, 204, 204); ">
                            <div class="col-sm-2"> 
                            <span style="font-weight: bold;">Starting date and time
                            </span>  
                            </div>
                            <div class="col-sm-4"  > 
                                <span style="margin-left: 13px;font-weight: bold;">09/16/2020/ 02:32:57</span>
                            </div>
                            <div class="col-sm-2"> 
                                <span style="font-weight: bold;">Date of Completing </span>  
                                </div>
                                <div class="col-sm-4" style="text-align: end;"> 
                                    <span style="margin-left: 13px"></span>
                                </div>
                            </div>
                            <div class="row" style="margin: 1px;  padding-left: 13px;padding-top: 5px; background-color: rgb(204, 204, 204); ">
                                <div class="col-sm-2"> 
                                <span style="font-weight: bold;">Mileage
                                </span>  
                                </div>
                                <div class="col-sm-4" > 
                                    <span style="margin-left: 13px;font-weight: bold;">23</span>
                                </div>
                                <div class="col-sm-2"> 
                                    <span style="font-weight: bold;">Final mileage</span>  
                                    </div>
                                    <div class="col-sm-4" > 
                                        <span style="margin-left: 13px;font-weight: bold;">23</span>
                                    </div>
                                </div>
                    </div>

</div>
<div class="row" style="font-weight: bold;margin: 25px;">
    <div class="col-sm-6" >Signature mechanic</div>
    <div class="col-sm-6"> Signature manager</div>
</div>
</body>

</html><?php /**PATH C:\xampp\htdocs\latest\16thsept1\resources\views/diagnosis/pdf.blade.php ENDPATH**/ ?>