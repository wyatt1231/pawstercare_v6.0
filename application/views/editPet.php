<?php echo form_open_multipart('User/editPets') ?>
<?php
$userId = $userInfo->id;
$name = $userInfo->name;
$type = $userInfo->type;
$breed = $userInfo->breed;
$color = $userInfo->color;
$size = $userInfo->size;
$age = $userInfo->age;
$gender = $userInfo->gender;
$pet_img = $userInfo->pet_img;
$Owner = $userInfo->Owner;

if ($Owner != 'City Office') {
    $dis = 'hidden';
} else {
    $dis = '';
}
?>
<style>
body {
    font-family: 'Times New Roman';
}

/* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */

.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Pet Information and Timeline
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- form start -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12" align="center">
                                <div class="form-group">
                                    <img src="<?php echo base_url(); ?>pets/<?php echo $pet_img; ?>" id='pet_img1'
                                        name="pet_img1" width='60%' height='60%'>
                                    <input type="hidden" value="<?php echo $pet_img; ?>" name="pet_img" id="pet_img" />
                                </div>
                                <h2 for="fname" align="center"><?php echo $name; ?></h2>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <!-- left column -->
            <div class="col-md-6">
                <div class="tab">
                    <button class="tablinks" type="button" onclick="openCity(event, 'London')" id="defaultOpen">
                        Update Information
                    </button>
                    <button class="tablinks" type="button" onclick="openCity(event, 'Tokyo')">Pet Timeline</button>
                </div>
                <!-- general form elements -->


                <div id="London" class="tabcontent ">

                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title"></h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Owner">Owner</label>
                                        <input type="text" class="form-control" id="Owner" placeholder="Pet Owner"
                                            name="Owner" value="<?php echo $Owner; ?>" maxlength="128">
                                    </div>
                                </div>
                                <script type="text/javascript">
                                function breed(b1, b2) {
                                    var b1 = document.getElementById(b1);
                                    var b2 = document.getElementById(b2);
                                    b2.innerHTML = "";
                                    if (b1.value == "Cat" || b1.textContent == 'Cat') {
                                        var optionArray = ["Persian|Persian", "Siamese|Siamese",
                                            "The maine coon|The Maine Coon", "Abyssinian|Abyssinian",
                                            "Ragdoll|Ragdoll",
                                            "Savannah|Savannah", "Burmese|Burmese", "Manx|Manx", "Sphynx|Sphynx",
                                            "Others|Others"
                                        ];
                                    } else if (b1.value == "Dog") {
                                        var optionArray = ["Husky|Husky", "Labrador|Labrador", "Pug|Pug",
                                            "Golden retriever|Golden Retriever", "Chow chow|Chow Chow",
                                            "Poodle|Poodle", "Aspin|Aspin", "Beagle|Beagle", "Dalmatian|Dalmatian",
                                            "Shih tzu|Shih Tzu", "Chihuahua|Chihuahua",
                                            "German shepherd|German Shepherd", "Doberman|Doberman",
                                            "Labrador retriever|Labrador Retriever", "Others|Others"
                                        ];
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
                                            "Junior -> 6-12 months|Junior -> 6-12 months",
                                            "Prime -> 1-7 years|Prime -> 1-7 years",
                                            "Mature-> Above 7 years|Mature-> Above 7 years"
                                        ];
                                    } else if (a1.value == "Dog") {
                                        var optionArray = ["Puppy ->  6 months below|Puppy ->  6 months below",
                                            "Junior -> 6-12 months|Junior -> 6-12 months",
                                            "Adult -> 1-7 years|Adult -> 1-7 years",
                                            "Mature-> Above 7 years|Mature-> Above 7 years"
                                        ];

                                    }
                                    for (var option in optionArray) {
                                        var pair = optionArray[option].split("|");
                                        var newOption = document.createElement("option");

                                        newOption.value = pair[0];
                                        newOption.innerHTML = pair[1];
                                        a2.options.add(newOption);
                                    }
                                }
                                $(function() {
                                    var breed = "<?php echo $breed; ?>";
                                    document.getElementById("Breed").value = breed;
                                });
                                jQuery(document).ready(function($) {
                                    var breed = "<?php echo $breed; ?>";
                                    $('#Breed').find('option[value=breed]').attr('selected', 'selected');
                                });
                                </script>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Type">Type</label>

                                        <select class="form-control required" id="type" name="type"
                                            onchange="breed('type','Breed'); age('type','Age');">

                                            <?php
                                            if (!empty($types)) {
                                                foreach ($types as $rl) {
                                                    ?>
                                            <option value="<?php echo $rl->name ?>"
                                                <?php if ($rl->name == $type) {
                                                    echo "selected";
                                                } ?>>
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
                                        <label for="Breed">Breed</label>
                                        <select class="form-control required" id="Breed" name="Breed">
                                            <?php
                                            if (!empty($breeds)) {
                                                foreach ($breeds as $rl) {
                                                    ?>
                                            <option value="<?php echo $rl->name ?>"
                                                <?php if ($rl->name == $breed) {
                                                    echo "selected";
                                                } ?>>
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
                                        <label for="Breed">Size</label>
                                        <select class="form-control required" id="Size" name="Size">

                                            <?php
                                            if (!empty($sizes)) {
                                                foreach ($sizes as $rl) {
                                                    ?>
                                            <option value="<?php echo $rl->name ?>"
                                                <?php if ($rl->name == $size) {
                                                    echo "selected";
                                                } ?>>
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
                                        <label for="Breed">Gender</label>
                                        <select class="form-control required" id="gender" name="gender">
                                            <option value="Male" <?php if ('Male' == $gender) {
                                                                    echo "selected";
                                                                } ?>>
                                                Male</option>
                                            <option value="Female"
                                                <?php if ('Female' == $gender) {
                                                    echo "selected";
                                                } ?>>Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Breed">Color</label>
                                        <select class="form-control required" id="color" name="color">

                                            <?php
                                            if (!empty($colors)) {
                                                foreach ($colors as $rl) {
                                                    ?>
                                            <option value="<?php echo $rl->name ?>"
                                                <?php if ($rl->name == $color) {
                                                    echo "selected";
                                                } ?>>
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
                                        <label for="Age">Age</label>
                                        <select class="form-control required" id="Age" name="Age">

                                            <?php
                                            if (!empty($ages)) {
                                                foreach ($ages as $rl) {
                                                    ?>
                                            <option value="<?php echo $rl->name ?>"
                                                <?php if ($rl->name == $age) {
                                                    echo "selected";
                                                } ?>>
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
                                        <label>Pet Image</label>
                                        <input type="file" name="img_pet" id="img_pet" size="20" accept=".jpg,.png,.gif"
                                            onchange="readURL(this);">
                                    </div>

                                </div>

                            </div>
                            <div class="box-footer">
                                <input type="submit" class="btn btn-primary" value="Submit"
                                    style="visibility:<?php echo $dis; ?>" />

                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div id="Tokyo" class="tabcontent">
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title"></h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->

                        <div class="box-body">
                            <div class="row">
                                <div class="content">
                                    <?php

                                    if (!empty($petlogs)) {
                                        foreach ($petlogs as $record) {

                                            ?>
                                    <!-- User image -->
                                    <!--<img class="img-circle img-sm" src="<?php echo base_url(); ?>pets/<?php echo $record->pet_img; ?>" > -->
                                    <?php 

                                    if ($record->Adoption_Status === 'FOR APPROVAL' || $record->Adoption_Status === 'FOR APPROVAL OF CITY VET') {
                                        echo $record->Pet . ' is for ';
                                        echo $record->Adoption_Status . ' for ';
                                    } else {
                                        echo $record->Pet . ' is ';
                                        echo $record->Adoption_Status . ' for ';
                                    }

                                    ?>
                                    <?php
                                    echo $record->Adopter;

                                    if ($record->Adoption_Status === 'REMOVED' || $record->Adoption_Status === 'DECLINED') {
                                        $time = $record->Date_Removed;
                                        $time = date("M-d-y h:i A", strtotime($time));
                                        echo '<span class="text-muted pull-right">' . $time . '</span>';
                                        echo '<br>';
                                    } else if ($record->Adoption_Status === 'APPROVED') {
                                        $time = $record->Date_Approved;
                                        $time = date("M-d-y h:i A", strtotime($time));
                                        echo '<span class="text-muted pull-right">' . $time . '</span>';
                                        echo '<br>';
                                    } else if ($record->Adoption_Status === 'CANCELLED') {
                                        $time = $record->Date_Cancelled;
                                        $time = date("M-d-y h:i A", strtotime($time));
                                        echo '<span class="text-muted pull-right">' . $time . '</span>';
                                        echo '<br>';
                                    } else if ($record->Adoption_Status === 'FOR APPROVAL' || $record->Adoption_Status === 'FOR APPROVAL OF CITY VET' || $record->Adoption_Status === 'Pending' || $record->Adoption_Status === 'PENDING') {
                                        $time = $record->timestamp;
                                        $time = date("M-d-y h:i A", strtotime($time));
                                        echo '<span class="text-muted pull-right">' . $time . '</span>';
                                        echo '<br>';

                                    }


                                    echo '<br>';
                                    ?>




                                    <!-- /.comment-text -->
                                    <?php

                                }
                            } else {
                                echo '<h3 align="center" form-control>NO DATA TO DISPLAY</h3>';
                            }
                            ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>


            <script>
            function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            }
            document.getElementById("defaultOpen").click();
            </script>
            <div class="col-md-4">
                <?php
                $this->load->helper('form');
                $error = $this->session->flashdata('error');
                if ($error) {
                    ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
                <?php 
            } ?>
                <?php 
                $success = $this->session->flashdata('success');
                if ($success) {
                    ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php 
            } ?>

                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#pet_img')
                .attr('src', e.target.result)
                .width(150)
                .height(200);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>