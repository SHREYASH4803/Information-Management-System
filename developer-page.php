<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Developer's Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="global.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> <!--bootstrap-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--font awesome-->
    
    <style>
        .body{
            color: #262626;
        }
        #team{
            text-align: center;
            padding: 1rem 7rem;
            margin: 2% 5%;
            display: flex
        }
        h6{
            font-size: 1.2em;
        }

        .card{
            padding: 1rem 1rem 1rem;
            display: block;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24)
        }
        .principal{
            margin: 3% 35% 7%;
        }
        .faculty{
            padding: 2%;
            margin: 3rem 2rem 5.5rem; 
        }
        .faculty p{
            font-size: 1.3rem;
        }
        .student{
            margin: 10px 0 5rem;
        }
        .student p{
            font-size: 16px;
        }
        .fa{
            color: #000;
            margin: 2% 10%;
            padding: 1rem 2.2rem 0;
        }
        .img-fluid{
            width: 40%;
        }

        #team .card:hover{
            color: #fff;
            background-color: #434343;
            transition: 1s;
            box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
        }

    </style>
</head>
<body>
    <div class="navbar">
      <img class="logo" src="https://i.postimg.cc/wvDjdZdp/logo.png" alt="image" width="3%">
      <h3 class="name">Fr. Conceicao Rodrigues Institute Of Technology</h3>
    </div>
    <section id="team">
        <div>
            <div class="row justify-content-between">

            <h2>Mentor</h2>
                <div class="team-card col-lg-4 col-md-6 principal">
                    <div class="card border-dark mb-3">
                        <div class="card-body">
                            <img src="images/principal.jpg" class="img-fluid rounded-circle wb-50 mb-3">
                            <h4 class="card-title">Dr. S. M. Khot</h4>
                            <h5>Principal</h5>
                            <p>FCRIT</p>
                        </div>
                    </div>
                </div>   


                <h2>Our Team</h2>

                <div class="team-card col-lg-5 col-md-6 faculty">
                    <div class="card border-dark mb-3">
                        <div class="card-body">
                        <img src="images/prof.archana.jpg" class="img-fluid rounded-circle wb-50 mb-3">
                            <h4>Prof. Archana Shirke</h4>
                            <h6>Asst. Professor</h6>
                            <p>Department of Information Technology</p>
                        </div>
                    </div>
                </div>  

                <div class="team-card col-lg-5 col-md-6 faculty">
                    <div class="card border-dark mb-3">
                        <div class="card-body">
                        <img src="images/prof.mini.jpg" class="img-fluid rounded-circle wb-50 mb-3">
                            <h4>Prof. Mini Namboothiripad</h4>
                            <h6>Asst. Professor</h6>
                            <p>Department of Electrical Engineering</p>
                        </div>
                    </div>
                </div>  
                <br><br>




                <div class="team-card col-lg-4 col-md-6 student">
                    <div class="card border-dark mb-3">
                        <div class="card-body">
                        <img src="images/lisha.jpg" class="img-fluid rounded-circle wb-50 mb-3">
                            <h4>Lisha Kothari</h4>
                            <p>Department of Information Technology (2020-2024)</p>
                            <div class="d-flex flex-row justify-content-center">
                                <a href="https://www.linkedin.com/in/lishakothari"><i class="fa fa-linkedin fa-lg"></i></a>
                                <a href="https://github.com/lishakothari"><i class="fa fa-github fa-lg"></i></i></a>
                            </div>
                        </div>
                    </div>
                </div>   


                <div class="team-card col-lg-4 col-md-6 student">
                    <div class="card border-dark mb-3">
                        <div class="card-body">
                        <img src="images/tejas.jpg" class="img-fluid rounded-circle wb-50 mb-3">
                            <h4>Tejas patil</h4>
                            <p>Department of Information Technology (2020-2024)</p>
                            <div class="d-flex flex-row justify-content-center">
                                <a href="#"><i class="fa fa-linkedin fa-lg"></i></a>
                                <a href="#"><i class="fa fa-github fa-lg"></i></i></a>
                            </div>
                        </div>
                    </div>
                </div> 

                <div class="team-card col-lg-4 col-md-6 student">
                    <div class="card border-dark mb-3">
                        <div class="card-body">
                        <img src="images/niraj.jpg" class="img-fluid rounded-circle wb-50 mb-3">
                            <h4>Niraj Patil</h4>
                            <p>Department of Information Technology (2020-2024)</p>
                            <div class="d-flex flex-row justify-content-center">
                                <a href="https://www.linkedin.com/in/niraj-patil-0789a4218"><i class="fa fa-linkedin fa-lg"></i></a>
                                <a href="https://github.com/patilniraj8"><i class="fa fa-github fa-lg"></i></i></a>
                            </div>
                        </div>
                    </div>
                </div> 

                <div class="team-card col-lg-4 col-md-6 student">
                    <div class="card border-dark mb-3">
                        <div class="card-body">
                        <img src="images/sayali.jpg" class="img-fluid rounded-circle wb-50 mb-3">
                            <h4>Sayali Ambure</h4>
                            <p>Department of Information Technology (2020-2024)</p>
                            <div class="d-flex flex-row justify-content-center">
                                <a href="https://www.linkedin.com/in/sayali-ambure-1066151ba/"><i class="fa fa-linkedin fa-lg"></i></a>
                                <a href="https://github.com/sayaliambure"><i class="fa fa-github fa-lg"></i></i></a>
                            </div>
                        </div>
                    </div>
                </div> 

                <div class="team-card col-lg-4 col-md-6 student">
                    <div class="card border-dark mb-3">
                        <div class="card-body">
                        <img src="images/tejal.jpg" class="img-fluid rounded-circle wb-50 mb-3">
                            <h4>Tejal Anavekar</h4>
                            <p>Department of Information Technology (2020-2024)</p>
                            <div class="d-flex flex-row justify-content-center">
                                <a href="https://www.linkedin.com/in/tejal-anavekar/"><i class="fa fa-linkedin fa-lg"></i></a>
                                <a href="https://github.com/tejalanavekar"><i class="fa fa-github fa-lg"></i></i></a>
                            </div>
                        </div>
                    </div>
                </div> 

                <div class="team-card col-lg-4 col-md-6 student">
                    <div class="card border-dark mb-3">
                        <div class="card-body">
                        <img src="images/vivek.jpg" class="img-fluid rounded-circle wb-50 mb-3">
                            <h4>Vivek Dhanade</h4>
                            <p>Department of Information Technology (2020-2024)</p>
                            <div class="d-flex flex-row justify-content-center">
                                <a href="#"><i class="fa fa-linkedin fa-lg"></i></a>
                                <a href="#"><i class="fa fa-github fa-lg"></i></i></a>
                            </div>
                        </div>
                    </div>
                </div> 

                <div class="team-card col-lg-4 col-md-6 student">
                    <div class="card border-dark mb-3">
                        <div class="card-body">
                        <img src="images/gurleen.jpg" class="img-fluid rounded-circle wb-50 mb-3">
                            <h4>Gurleen Kaur</h4>
                            <p>Department of Information Technology (2020-2024)</p>
                            <div class="d-flex flex-row justify-content-center">
                                <a href="https://www.linkedin.com/in/gurleen-kaur-kalsi-a95ab4252/"><i class="fa fa-linkedin fa-lg"></i></a>
                                <a href="https://github.com/GurleenKaur09"><i class="fa fa-github fa-lg"></i></i></a>
                            </div>
                        </div>
                    </div>
                </div> 

                <div class="team-card col-lg-4 col-md-6 student">
                    <div class="card border-dark mb-3">
                        <div class="card-body">
                        <img src="images/medini.jpg" class="img-fluid rounded-circle wb-50 mb-3">
                            <h4>Medini Shirpurkar</h4>
                            <p>Department of Information Technology (2020-2024)</p>
                            <div class="d-flex flex-row justify-content-center">
                                <a href="https://www.linkedin.com/in/medini-shirpurkar-737ba4241"><i class="fa fa-linkedin fa-lg"></i></a>
                                <a href="https://github.com/medini9"><i class="fa fa-github fa-lg"></i></i></a>
                            </div>
                        </div>
                    </div>
                </div> 

            </div>
        </div>

    </section>
    
</body>
</html>