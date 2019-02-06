   <?php
   $Status = $useranswer->Status;
   $img = $useranswer->pet_img;
   $petname=$useranswer->name;
   $petbreed=$useranswer->Breed;
   $petcolor=$useranswer->color;
   $petage=$useranswer->age;
   $petsize=$useranswer->size;
   $petgender=$useranswer->gender;

   $petid = $useranswer->pet_id;
   $q1 = $useranswer->q1;

   $q2 = $useranswer->q2;
   $q3 = $useranswer->q3;

   $q4 = $useranswer->q4;
   $q5 = $useranswer->q5;
   $q6 = $useranswer->q6;

   $q7 = $useranswer->q7;
   $q8 = $useranswer->q8;
   $q9 = $useranswer->q9;

   $q10 = $useranswer->q10;
   $q11 = $useranswer->q11;

   $Status = $useranswer->Status;
   $img = $useranswer->pet_img;
   $petname=$useranswer->name;
   $petbreed=$useranswer->Breed;
   $petcolor=$useranswer->color;
   $petage=$useranswer->age;
   $petsize=$useranswer->size;
   $petgender=$useranswer->gender;

   $petid = $useranswer->pet_id;
   $q1 = $useranswer->q1;

   $q2 = $useranswer->q2;
   $q3 = $useranswer->q3;

   $q4 = $useranswer->q4;
   $q5 = $useranswer->q5;
   $q6 = $useranswer->q6;

   $q7 = $useranswer->q7;
   $q8 = $useranswer->q8;
   $q9 = $useranswer->q9;

   $q10 = $useranswer->q10;
   $q11 = $useranswer->q11;
   ?>

   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Adoption Information
    </h1>
</section>

<section class="content">

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
            <div class="col-md-6">

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Adoption Information</h3>
                    </div>
                    <div class="box-body">
                       <img style=' display: block; margin-left: auto; margin-right: auto;' src="<?php echo base_url(); ?>pets/<?php echo $img; ?>" name="pet_img" width='240px' height='240px' >
                       <div class="col-md-6">
                        <h3 align="justify">Pet Name:  <?php echo $petname;?> </h3>
                    </div>
                    <div class="col-md-6">
                        <h3 align="justify"> Pet Breed: <?php echo $petbreed;?> </h3>
                    </div>
                    <div class="col-md-6">
                        <h3 align="justify">Pet Color: <?php echo $petcolor;?> </h3>

                    </div>
                    <div class="col-md-6">
                        <h3 align="justify">Pet Size: <?php echo $petsize;?> </h3>
                    </div>
                    <div class="col-md-6">
                        <h3 align="justify"> Pet Gender: <?php echo $petgender;?> </h3>
                    </div>
                    <div class="col-md-6">
                        <h3 align="justify">Pet Age: <?php echo $petage;?> </h3>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-md-6">

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Questioner</h3>

                        <div class="row">
                            <div class="col-md-6">                                
                                <div class="form-group">
                                    <label for="fname">Why did you decide to adopt a pet from PawsterCare?</label>
                                    <textarea disabled type="text" class="form-control" id="fname" name="" value="<?php echo $q1; ?>" maxlength="128"> <?php echo $q1; ?></textarea>
                                    <input  type="hidden" value="<?php echo $petid; ?>" name="petid" id="petid" />    

                                </div>

                            </div>

                            <div class="col-md-6">                                
                                <div class="form-group">
                                    <label for="fname">How many hours in workdays will your pet spend without human?</label>
                                    <textarea disabled type="text" class="form-control" id="mname"  name="" value="<?php echo $q2; ?>" maxlength="128"><?php echo $q2; ?></textarea>

                                </div>
                            </div>


                            <div class="col-md-6">                                
                                <div class="form-group">
                                    <label for="fname">During vacations or emergency situation what will happen to the pet?</label>
                                    <textarea disabled type="text" class="form-control" id="lname" Name="" value="<?php echo $q3; ?>" maxlength="128"><?php echo $q3; ?></textarea>

                                </div>
                            </div>


                            <div class="col-md-6">                                
                                <div class="form-group">
                                    <label for="fname">Where will this pet be kept during the day or night?</label>
                                    <textarea disabled type="text" class="form-control" id="fname" name="" value="<?php echo $q4; ?>" maxlength="128"><?php echo $q4; ?> </textarea>


                                </div>

                            </div>

                            <div class="col-md-6">                                
                                <div class="form-group">
                                    <label for="fname">What type of building do live in?</label>
                                    <textarea disabled type="text" class="form-control" id="mname"  name="" value="<?php echo $q5; ?>" maxlength="128"><?php echo $q5?></textarea>

                                </div>
                            </div>


                            <div class="col-md-6">                                
                                <div class="form-group">
                                    <label for="fname">Who do you live with?</label>
                                    <textarea disabled type="text" class="form-control" id="lname" Name="" value="<?php echo $q6; ?>" maxlength="128"><?php echo $q6; ?></textarea>

                                </div>
                            </div>



                            <div class="col-md-6">                                
                                <div class="form-group">
                                    <label for="fname">Will the whole family share in the care of the pet?</label>
                                    <textarea disabled type="text" class="form-control" id="fname" name="" value="<?php echo $q7; ?>" maxlength="128"> <?php echo $q7; ?></textarea>


                                </div>

                            </div>

                            <div class="col-md-6">                                
                                <div class="form-group">
                                    <label for="fname">For whom are you <br>adopting?</label>
                                    <textarea disabled type="text" class="form-control" id="mname"  name="" value="" maxlength="128"><?php echo $q8; ?></textarea>

                                </div>
                            </div>


                            <div class="col-md-6">                                
                                <div class="form-group">
                                    <label for="fname">Are there any children who visits you home frequently</label>
                                    <textarea disabled type="text" class="form-control" id="lname" ame="" value="<?php echo $q9; ?>" maxlength="128"><?php echo $q9; ?></textarea>

                                </div>
                            </div>


                            <div class="col-md-6">                                
                                <div class="form-group">
                                    <label for="fname">Do you havev other pet companion in the past?</label>
                                    <textarea disabled type="text" class="form-control" id="fname" name="" value="<?php echo $q10; ?>" maxlength="128"><?php echo $q10; ?> </textarea>

                                </div>

                            </div>

                            <div class="col-md-6">                                
                                <div class="form-group">
                                    <label for="fname">Do you have a fenced yard?</label>
                                    <textarea disabled type="text" class="form-control" id="mname"  name="" value="" maxlength="128"><?php echo $q11; ?></textarea>

                                </div>
                            </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

</div>
               