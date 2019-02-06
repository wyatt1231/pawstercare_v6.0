<?php echo form_open_multipart('User/addPet')?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Add Pet
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Pet Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fname">Full Name</label>
                                    <input type="text" class="form-control required"
                                        value="<?php echo set_value('fname'); ?>" id="fname" name="fname"
                                        maxlength="128">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Type">Type</label>
                                    <select class="form-control required" id="type" name="type"
                                        onchange="breed('type','Breed'); age('type','Age');">
                                        <option value="0">Select Type</option>
                                        <?php
                                        if(!empty($types))
                                        {
                                            foreach ($types as $rl)
                                            {
                                                ?>
                                        <option value="<?php echo $rl->name ?>">
                                            <?php echo $rl->name ?></option>
                                        <?php
                                                }
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!--  <div class="col-md-12">                                
                            <div class="form-group">
                                <label for="fname">Hobbies</label>
                                <input type="text" class="form-control required" value="<?php echo set_value('hobbies'); ?>" id="hobbies" name="hobbies" maxlength="128">
                            </div>

                        </div> -->
                            <script type="text/javascript">
                            function breed(b1, b2) {
                                var b1 = document.getElementById(b1);
                                var b2 = document.getElementById(b2);
                                b2.innerHTML = "";
                                if (b1.value == "Cat") {
                                    var optionArray = ["Persian|Persian", "Siamese|Siamese",
                                        "The maine coon|The Maine Coon", "Abyssinian|Abyssinian", "Ragdoll|Ragdoll",
                                        "Savannah|Savannah", "Burmese|Burmese", "Manx|Manx", "Sphynx|Sphynx",
                                        "Others|Others"
                                    ];
                                } else if (b1.value == "Dog") {
                                    var optionArray = ["Husky|Husky", "Labrador|Labrador", "Pug|Pug",
                                        "Golden retriever|Golden Retriever", "Chow chow|Chow Chow",
                                        "Poodle|Poodle", "Aspin|Aspin", "Beagle|Beagle", "Dalmatian|Dalmatian",
                                        "Shih tzu|Shih Tzu", "Chihuahua|Chihuahua",
                                        "German shepherd|German Shepherd", "Doberman|Doberman",
                                        "labrador retriever|Labrador Retriever,", "others|Others"
                                    ];

                                } else {
                                    var optionArray = ["Select Breed|Select Breed"];
                                }
                                for (var option in optionArray) {
                                    var pair = optionArray[option].split("|");
                                    var newOption = document.createElement("option");

                                    newOption.value = pair[0];
                                    newOption.innerHTML = pair[1];
                                    b2.options.add(newOption);
                                }

                            }

                            function age(a1, a2) {
                                var a1 = document.getElementById(a1);
                                var a2 = document.getElementById(a2);
                                a2.innerHTML = "";
                                if (a1.value == "Cat") {
                                    var optionArray = ["Kittens -> 6 months below|Kittens -> 6 months below",
                                        "Junior -> 6-12 Months|Junior -> 6-12 Months",
                                        "Prime -> 1-7 years|Prime -> 1-7 years",
                                        "Mature -> Above 7 years|Mature -> Above 7 years"
                                    ];
                                } else if (a1.value == "Dog") {
                                    var optionArray = ["Puppy -> 6 months below|Puppy -> 6 months below",
                                        "Junior -> 6-12 months|Junior -> 6-12 months",
                                        "Adult -> 1-7 Years|Adult -> 1-7 Years",
                                        "Mature -> Above 7 years|Mature -> Above 7 years"
                                    ];

                                } else {
                                    var optionArray = ["Select age|Select age"];
                                }
                                for (var option in optionArray) {
                                    var pair = optionArray[option].split("|");
                                    var newOption = document.createElement("option");

                                    newOption.value = pair[0];
                                    newOption.innerHTML = pair[1];
                                    a2.options.add(newOption);
                                }

                            }
                            </script>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Age">Age</label>
                                    <select class="form-control required" id="Age" name="Age">
                                        <option value="0">Select Age</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Breed">Breed</label>
                                    <select class="form-control required" id="Breed" name="Breed">
                                        <option value="0">Select Breed</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Breed">Size</label>
                                    <select class="form-control required" id="size" name="size">
                                        <option value="0">Select Size</option>
                                        <?php
                                        if(!empty($sizes))
                                        {
                                            foreach ($sizes as $rl)
                                            {
                                                ?>
                                        <option value="<?php echo $rl->name ?>">
                                            <?php echo $rl->name ?></option>
                                        <?php
                                                }
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Breed">Color</label>
                                    <select class="form-control required" id="color" name="color">
                                        <option value="0">Select color</option>
                                        <?php
                                            if(!empty($colors))
                                            {
                                                foreach ($colors as $rl)
                                                {
                                                    ?>
                                        <option value="<?php echo $rl->name ?>">
                                            <?php echo $rl->name ?></option>
                                        <?php
                                                   }
                                               }
                                               ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Breed">Gender</label>
                                    <select class="form-control required" id="gender" name="gender">
                                        <option value="0">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="petowner">Pet Owner</label>
                                    <select class="form-control required" id="petowner" name="petowner">
                                        <option value="1">City Veterinarians Office</option>
                                        <!--  <?php
                                            if(!empty($roles))
                                            {
                                                foreach ($roles as $rl)
                                                {
                                                    ?>
                                                    <option value="<?php echo $rl->roleId ?>" <?php if($rl->roleId == set_value('role')) {echo "selected=selected";} ?>><?php echo $rl->role ?></option>
                                                    <?php
                                                }
                                            }
                                            ?> -->
                                    </select>

                                </div>
                            </div>

                        </div>

                        <div class="row">



                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Pet Image</label>
                                    <input type="file" name="userfile" id="userfile" size="20">
                                </div>

                            </div>
                        </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary" value="Submit" />
                        <input type="reset" class="btn btn-default" value="Reset" />
                    </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <?php
            $error = $this->session->flashdata('error');
            if($error)
            {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
                <?php } ?>
                <?php  
            $success = $this->session->flashdata('success');
            if($success)
            {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>

                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script>