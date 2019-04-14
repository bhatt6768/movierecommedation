function getSimilarMovies() {
    let movieId = sessionStorage.getItem('id');
    console.log(movieId);


     axios.get(`https://api.themoviedb.org/3/movie/${movieId}/similar?api_key=6d79a1c4ae16e887d27509a77d40c324&page=1`)
        //  axios.get('http://www.omdbapi.com/?apikey=a15bc27e&s=' + searchText)
        .then((response) => {
            console.log(response);

            let movies = response.data.results;
            let output = '';
            let output1 = '';
            $.each(movies, (index, movie) => {

                if (movie.poster_path === null) {
                    poster = "../image/default-movie.png";
                } else {
                    poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movie.poster_path;
                }

                let date = movie.release_date;

                let year = date.slice(0, 4);
                output += `
               
                       <a   class="hvr-sweep-to-bottom"><img src="${poster}" title="Movies Pro" class="img-responsive" alt=" " />
                                <div class="w3l-action-icon"><i class="fa fa-play-circle-o" aria-hidden="true"></i></div>
                            </a>
                            <div >
                                <div  onclick="movieSelected('${movies[index].id}')">
                                    <h6><a href="#">${movies[index].title}</a></h6>                            
                                </div>
                                
                                    <p>${year}</p>
                                   
                                    <div class="clearfix"></div>
                                
                            </div>
                            
                            
                           
                `
            });
            $('#searchmovies1').html(output);
        })
        .catch((error) => {
            console.log(error);
        });
}

function getMovies(searchText) {

    axios.get('https://api.themoviedb.org/3/search/movie?api_key=6d79a1c4ae16e887d27509a77d40c324&query=' + searchText)
        //  axios.get('http://www.omdbapi.com/?apikey=a15bc27e&s=' + searchText)
        .then((response) => {
            console.log(response);

            let movies = response.data.results;
            let output = '';
            let output1 = '';
            $.each(movies, (index, movie) => {

                if (movie.poster_path === null) {
                    poster = "../image/default-movie.png";
                } else {
                    poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movie.poster_path;
                }

                let date = movie.release_date;

                let year = date.slice(0, 4);
                output += `
               
                       <a   class="hvr-sweep-to-bottom"><img src="${poster}" title="Movies Pro" class="img-responsive" alt=" " />
                                <div class="w3l-action-icon"><i class="fa fa-play-circle-o" aria-hidden="true"></i></div>
                            </a>
                            <div >
                                <div  onclick="movieSelected('${movies[index].id}')">
                                    <h6><a href="#">${movies[index].title}</a></h6>                            
                                </div>
                                
                                    <p>${year}</p>
                                   
                                    <div class="clearfix"></div>
                                
                            </div>
                            
                            
                           
                `
            });
            $('#searchmovies').html(output);
        })
        .catch((error) => {
            console.log(error);
        });
}




// function movieSelected2(id) {
//     sessionStorage.setItem('id', id);
//     window.location = 'guest/movie.php';
//     return false;
// }

function movieSelected(id) {
    sessionStorage.setItem('id', id);
    window.location = 'moviedetails.php';
    return false;
}
function createCookie(name, value, days) {
                  var expires;
                  if (days) {
                    var date = new Date();
                    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                    expires = "; expires=" + date.toGMTString();
                  } else {
                   expires = "";
                  }
                  document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
                }

function getMovie() {
    let movieId = sessionStorage.getItem('id');
    console.log(movieId);


    //test id -> 299536
    axios.get(`https://api.themoviedb.org/3/movie/${movieId}?api_key=6d79a1c4ae16e887d27509a77d40c324`)
        .then((response) => {
            // https://api.themoviedb.org/3/movie/299536/reviews?api_key=5ec279387e9aa9488ef4d00b22acc451&language=en-US&page=1
            console.log(response);
            let movie = response.data;

            if (movie.poster_path === null) {
                poster = "../image/default-movie.png";
            } else {
                poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movie.poster_path;
            }

            let date = movie.release_date;

            let year = date.slice(0, 4);
              document.cookie = "y="+year+";"
            let Rated;


            let revenue = movie.revenue / 1000000;
            let budget = movie.budget / 1000000;
            revenue = Math.round(revenue);
            budget = Math.round(budget);

            if (revenue === 0) {
                revenue = "Revenue is less than million dollers"
            }

            if (budget === 0) {
                budget = "Budget is less than million dollers"
            }

            let genre = [];
            movie.genres.forEach(element => {
                genre.push(element.name);
            });

            genres = genre.join(' / ');
              document.cookie = "t="+movie.title+";"
           
                                                

            let output1 = `
             <p class="fexi_header">${movie.title} </p>
                                                <p class="fexi_header_para"><span class="conjuring_w3">Sypnosis<label>:</label></span>${movie.overview}</p>
                                                <p class="fexi_header_para"><span>Release On<label>:</label></span>${year}</p>
                                                <p class="fexi_header_para">
                                                    <span>Genres<label>:</label> </span>
                                                        ${genres}                      
                                                </p>
                                                <p class="fexi_header_para">
                                                    <span>Status<label>:</label> </span>
                                                        ${movie.status}                      
                                                </p>
                                                <p class="fexi_header_para">
                                                    <span>Ratings<label>:</label> </span>
                                                    ${movie.vote_average}
                                                                             
                                                </p>
                                                <p class="fexi_header_para">
                                                    <span>Budget<label>:</label> </span>
                                                               $ ${budget} million             
                                                </p>
                                                <p class="fexi_header_para">
                                                    <span>Revenue<label>:</label> </span>
                                                         $ ${revenue} million                      
                                                </p>
                                                <p class="fexi_header_para">
                                                    <span>IMDB link<label>:</label> </span>
                                                        <a target="_blank"  href="http://imdb.com/title/${movie.imdb_id}">IMDB</a>                 
                                                </p>
                                               
           
            `
            

            $('#movieinfo').html(output1);
        })
        .catch((error) => {
            console.log(error);
        });
}

function getMovietraier() {
    let movieId = sessionStorage.getItem('id');
    document.cookie = "m="+movieId+";"
    
  axios.get(`https://api.themoviedb.org/3/movie/${movieId}?api_key=6d79a1c4ae16e887d27509a77d40c324&append_to_response=videos`)
        .then((response) => {
  
  console.log(response);
            let movie = response.data;

                 let id = movie.videos;
                 var videoid=id.results[0].key;
                 localStorage.setItem('movieid',videoid);
                  
                
                 console.log(id);
                 console.log(videoid);


                                                

            let output1 = `
            
                                                   
                                                  
                                                       <iframe width="100%" height="500" align="center" src="https://www.youtube.com/embed/${videoid}" allowfullscreen>
                                                            </iframe>
                                                     <h1> Official Trailer</h1>`
                                           
            
           
            
            $('#movietrailer').html(output1);
             document.cookie = "vid="+videoid+";"
        
                 })
        .catch((error) => {
            console.log(error);
        });




        }
      

function getpopularMovies() {
    axios.get('https://api.themoviedb.org/3/movie/popular?api_key=6d79a1c4ae16e887d27509a77d40c324&language=en-US&page=1')
        .then((response) => {
            console.log(response);

            let movies = response.data.results;
            // console.log(movies);

            let output = '';

            for (let index = 0; index < 4; index++) {
                if (movies[index].poster_path === null) {
                    poster = "../image/default-movie.png";
                } else {
                    poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movies[index].poster_path;
                }

                let date = movies[index].release_date;

                let year = date.slice(0, 4);
                        
                        
              
                output += `
                
                            <a   class="hvr-sweep-to-bottom"><img src="${poster}" title="Movies Pro" class="img-responsive" alt=" " />
                                <div class="w3l-action-icon"><i class="fa fa-play-circle-o" aria-hidden="true"></i></div>
                            </a>
                            <div class="mid-1 agileits_w3layouts_mid_1_home">
                                <div class="w3l-movie-text"  onclick="movieSelected('${movies[index].id}')">
                                    <h6><a href="#">${movies[index].title}</a></h6>                            
                                </div>
                                <div class="mid-2 agile_mid_2_home">
                                    <p>${year}</p>
                                   
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="ribben one">
                                <p>NEW</p>
                            </div>
                          
                        
                        
                `;
            }
            $('#pop1').html(output);


            let output1 = '';
            for (let index = 4; index < 8; index++) {
                if (movies[index].poster_path === null) {
                    poster = "../image/default-movie.png";
                } else {
                    poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movies[index].poster_path;
                }

                let date = movies[index].release_date;

                let year = date.slice(0, 4);
                output1 += `
              
                            <a href="moviedetails.php" class="hvr-sweep-to-bottom"><img src="${poster}" title="Movies Pro" class="img-responsive" alt=" " />
                                <div class="w3l-action-icon"><i class="fa fa-play-circle-o" aria-hidden="true"></i></div>
                            </a>
                            <div class="mid-1 agileits_w3layouts_mid_1_home">
                                <div class="w3l-movie-text"  onclick="movieSelected('${movies[index].id}')">
                                    <h6><a href="#">${movies[index].title}</a></h6>                            
                                </div>
                                <div class="mid-2 agile_mid_2_home">
                                    <p>${year}</p>
                                   
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="ribben one">
                                <p>NEW</p>
                            </div>
                          
                      
                        
                `;
            }
            $('#pop2').html(output1);


           



           




           
            // $.each(movies, (index, movie) => {

            //     if (movie.poster_path === null) {
            //         poster = "image/default-movie.png";
            //     } else {
            //         poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movie.poster_path;
            //     }

            //     let date = movie.release_date;

            //     let year = date.slice(0, 4);
            //     output += `
            //             <div class="col-md-3 box">
            //               <div class="movieBox">
            //                 <img src="${poster}" alt="poster" width="210" height="315" class="img">
            //                 <div class="browse-movie-bottom">
            //                     <a href="#" onclick="movieSelected('${movie.id}')" class="browse-movie-title">${movie.title}</a>
            //                     <div class="browse-movie-year">${year}</div>
            //                     <button type="submit" class="button" onclick="movieSelected('${movie.id}')">Movie Details</button>
            //                 </div>
            //                 </div>
            //             </div>
            //     `;
            //     if (index < 4) {
            //         $('#topMovies1').html(output);
            //     }
            //     else if (index < 8) {
            //         $('#topMovies2').html(output);
            //     }
            //     else if (index < 12) {
            //         $('#topMovies3').html(output);
            //     }
            //     else if (index < 16) {
            //         $('#topMovies4').html(output);
            //     }
            //     else if (index < 19) {
            //         $('#topMovies5').html(output);
            //     }

            // });


            // $('#topMovies').html(output);
        })
        .catch((error) => {
            console.log(error);
        });
}


//// for top rated movies
function getTopMovies() {
    axios.get('https://api.themoviedb.org/3/movie/top_rated?api_key=6d79a1c4ae16e887d27509a77d40c324&language=en-US&page=1')
        .then((response) => {
            console.log(response);

            let movies = response.data.results;
            // console.log(movies);

            let output = '';

            for (let index = 0; index < 4; index++) {
                if (movies[index].poster_path === null) {
                    poster = "../image/default-movie.png";
                } else {
                    poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movies[index].poster_path;
                }

                let date = movies[index].release_date;

                let year = date.slice(0, 4);
                        
                        
              
                output += `
                <div class="w3l-movie-gride-agile w3l-movie-gride-slider ">
                            <a href="moviedetails.php" class="hvr-sweep-to-bottom"><img src="${poster}" title="Movies Pro" class="img-responsive" alt=" " />
                                <div class="w3l-action-icon"><i class="fa fa-play-circle-o" aria-hidden="true"></i></div>
                            </a>
                            <div class="mid-1 agileits_w3layouts_mid_1_home">
                                <div class="w3l-movie-text"  onclick="movieSelected('${movies[index].id}')">
                                    <h6><a href="#">${movies[index].title}</a></h6>                            
                                </div>
                                <div class="mid-2 agile_mid_2_home">
                                    <p>${year}</p>
                                   
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="ribben one">
                                <p>NEW</p>
                            </div>
                          
                        </div>
                        
                `;
            }
            $('#topratedmovies1').html(output);


            let output1 = '';
            for (let index = 4; index < 8; index++) {
                if (movies[index].poster_path === null) {
                    poster = "../image/default-movie.png";
                } else {
                    poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movies[index].poster_path;
                }

                let date = movies[index].release_date;

                let year = date.slice(0, 4);
                output1 += `
                <div class="w3l-movie-gride-agile w3l-movie-gride-slider ">
                            <a href="moviedetails.php" class="hvr-sweep-to-bottom"><img src="${poster}" title="Movies Pro" class="img-responsive" alt=" " />
                                <div class="w3l-action-icon"><i class="fa fa-play-circle-o" aria-hidden="true"></i></div>
                            </a>
                            <div class="mid-1 agileits_w3layouts_mid_1_home">
                                <div class="w3l-movie-text"  onclick="movieSelected('${movies[index].id}')">
                                    <h6><a href="#">${movies[index].title}</a></h6>                            
                                </div>
                                <div class="mid-2 agile_mid_2_home">
                                    <p>${year}</p>
                                   
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="ribben one">
                                <p>NEW</p>
                            </div>
                          
                        </div>
                        
                `;
            }
            $('#topratedmovies2').html(output1);


            let output2 = '';
            for (let index = 8; index < 12; index++) {
                if (movies[index].poster_path === null) {
                    poster = "../image/default-movie.png";
                } else {
                    poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movies[index].poster_path;
                }

                let date = movies[index].release_date;

                let year = date.slice(0, 4);
                output2 += `
                 <div class="w3l-movie-gride-agile w3l-movie-gride-slider ">
                            <a href="moviedetails.php" class="hvr-sweep-to-bottom"><img src="${poster}" title="Movies Pro" class="img-responsive" alt=" " />
                                <div class="w3l-action-icon"><i class="fa fa-play-circle-o" aria-hidden="true"></i></div>
                            </a>
                            <div class="mid-1 agileits_w3layouts_mid_1_home">
                                <div class="w3l-movie-text"  onclick="movieSelected('${movies[index].id}')">
                                    <h6><a href="#">${movies[index].title}</a></h6>                            
                                </div>
                                <div class="mid-2 agile_mid_2_home">
                                    <p>${year}</p>
                                   
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="ribben one">
                                <p>NEW</p>
                            </div>
                          
                        </div>
                        
                `;
            }
            $('#topratedmovies3').html(output2);



            let output3 = '';
            for (let index = 12; index < 16; index++) {
                if (movies[index].poster_path === null) {
                    poster = "../image/default-movie.png";
                } else {
                    poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movies[index].poster_path;
                }

                let date = movies[index].release_date;

                let year = date.slice(0, 4);
                output3 += `
                 <div class="w3l-movie-gride-agile w3l-movie-gride-slider ">
                            <a href="moviedetails.php" class="hvr-sweep-to-bottom"><img src="${poster}" title="Movies Pro" class="img-responsive" alt=" " />
                                <div class="w3l-action-icon"><i class="fa fa-play-circle-o" aria-hidden="true"></i></div>
                            </a>
                            <div class="mid-1 agileits_w3layouts_mid_1_home">
                                <div class="w3l-movie-text"  onclick="movieSelected('${movies[index].id}')">
                                    <h6><a href="#">${movies[index].title}</a></h6>                            
                                </div>
                                <div class="mid-2 agile_mid_2_home">
                                    <p>${year}</p>
                                   
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="ribben one">
                                <p>NEW</p>
                            </div>
                          
                        </div>
                        
                `;
            }
            $('#topratedmovies4').html(output3);




            let output4 = '';
            for (let index = 16; index < 20; index++) {
                if (movies[index].poster_path === null) {
                    poster = "../image/default-movie.png";
                } else {
                    poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movies[index].poster_path;
                }

                let date = movies[index].release_date;

                let year = date.slice(0, 4);
                output4 += `
                 <div class="w3l-movie-gride-agile w3l-movie-gride-slider ">
                            <a href="moviedetails.php" class="hvr-sweep-to-bottom"><img src="${poster}" title="Movies Pro" class="img-responsive" alt=" " />
                                <div class="w3l-action-icon"><i class="fa fa-play-circle-o" aria-hidden="true"></i></div>
                            </a>
                            <div class="mid-1 agileits_w3layouts_mid_1_home">
                                <div class="w3l-movie-text"  onclick="movieSelected('${movies[index].id}')">
                                    <h6><a href="#">${movies[index].title}</a></h6>                            
                                </div>
                                <div class="mid-2 agile_mid_2_home">
                                    <p>${year}</p>
                                   
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="ribben one">
                                <p>NEW</p>
                            </div>
                          
                        </div>
                        
                `;
            }
            $('#topratedmovies5').html(output4);
            // $.each(movies, (index, movie) => {

            //     if (movie.poster_path === null) {
            //         poster = "image/default-movie.png";
            //     } else {
            //         poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movie.poster_path;
            //     }

            //     let date = movie.release_date;

            //     let year = date.slice(0, 4);
            //     output += `
            //             <div class="col-md-3 box">
            //               <div class="movieBox">
            //                 <img src="${poster}" alt="poster" width="210" height="315" class="img">
            //                 <div class="browse-movie-bottom">
            //                     <a href="#" onclick="movieSelected('${movie.id}')" class="browse-movie-title">${movie.title}</a>
            //                     <div class="browse-movie-year">${year}</div>
            //                     <button type="submit" class="button" onclick="movieSelected('${movie.id}')">Movie Details</button>
            //                 </div>
            //                 </div>
            //             </div>
            //     `;
            //     if (index < 4) {
            //         $('#topMovies1').html(output);
            //     }
            //     else if (index < 8) {
            //         $('#topMovies2').html(output);
            //     }
            //     else if (index < 12) {
            //         $('#topMovies3').html(output);
            //     }
            //     else if (index < 16) {
            //         $('#topMovies4').html(output);
            //     }
            //     else if (index < 19) {
            //         $('#topMovies5').html(output);
            //     }

            // });


            // $('#topMovies').html(output);
        })
        .catch((error) => {
            console.log(error);
        });
}

function getTrendingMovies() {
    axios.get('https://api.themoviedb.org/3/trending/all/week?api_key=6d79a1c4ae16e887d27509a77d40c324')
        .then((response) => {
            console.log(response);

            let movies = response.data.results;
            // console.log(movies);

            let output = '';

            for (let index = 0; index < 4; index++) {
                if (movies[index].poster_path === null) {
                    poster = "../image/default-movie.png";
                } else {
                    poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movies[index].poster_path;
                }

                let date = movies[index].release_date;

                let year = date.slice(0, 4);
                        
                        
              
                output += `
                <div class="w3l-movie-gride-agile w3l-movie-gride-slider ">
                            <a href="moviedetails.php" class="hvr-sweep-to-bottom"><img src="${poster}" title="Movies Pro" class="img-responsive" alt=" " />
                                <div class="w3l-action-icon"><i class="fa fa-play-circle-o" aria-hidden="true"></i></div>
                            </a>
                            <div class="mid-1 agileits_w3layouts_mid_1_home">
                                <div class="w3l-movie-text"  onclick="movieSelected('${movies[index].id}')">
                                    <h6><a href="#">${movies[index].title}</a></h6>                            
                                </div>
                                <div class="mid-2 agile_mid_2_home">
                                    <p>${year}</p>
                                   
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="ribben one">
                                <p>NEW</p>
                            </div>
                          
                        </div>
                        
                `;
            }
            $('#trend1').html(output);


            let output1 = '';
            for (let index = 4; index < 8; index++) {
                if (movies[index].poster_path === null) {
                    poster = "../image/default-movie.png";
                } else {
                    poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movies[index].poster_path;
                }

                let date = movies[index].release_date;

                let year = date.slice(0, 4);
                output1 += `
                <div class="w3l-movie-gride-agile w3l-movie-gride-slider ">
                            <a href="moviedetails.php" class="hvr-sweep-to-bottom"><img src="${poster}" title="Movies Pro" class="img-responsive" alt=" " />
                                <div class="w3l-action-icon"><i class="fa fa-play-circle-o" aria-hidden="true"></i></div>
                            </a>
                            <div class="mid-1 agileits_w3layouts_mid_1_home">
                                <div class="w3l-movie-text"  onclick="movieSelected('${movies[index].id}')">
                                    <h6><a href="#">${movies[index].title}</a></h6>                            
                                </div>
                                <div class="mid-2 agile_mid_2_home">
                                    <p>${year}</p>
                                   
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="ribben one">
                                <p>NEW</p>
                            </div>
                          
                        </div>
                        
                `;
            }
            $('#trend2').html(output1);


            let output2 = '';
            for (let index = 8; index < 12; index++) {
                if (movies[index].poster_path === null) {
                    poster = "../image/default-movie.png";
                } else {
                    poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movies[index].poster_path;
                }

                let date = movies[index].release_date;

                let year = date.slice(0, 4);
                output2 += `
                 <div class="w3l-movie-gride-agile w3l-movie-gride-slider ">
                            <a href="moviedetails.php" class="hvr-sweep-to-bottom"><img src="${poster}" title="Movies Pro" class="img-responsive" alt=" " />
                                <div class="w3l-action-icon"><i class="fa fa-play-circle-o" aria-hidden="true"></i></div>
                            </a>
                            <div class="mid-1 agileits_w3layouts_mid_1_home">
                                <div class="w3l-movie-text"  onclick="movieSelected('${movies[index].id}')">
                                    <h6><a href="#">${movies[index].title}</a></h6>                            
                                </div>
                                <div class="mid-2 agile_mid_2_home">
                                    <p>${year}</p>
                                   
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="ribben one">
                                <p>NEW</p>
                            </div>
                          
                        </div>
                        
                `;
            }
            $('#trend3').html(output2);



            let output3 = '';
            for (let index = 12; index < 16; index++) {
                if (movies[index].poster_path === null) {
                    poster = "../image/default-movie.png";
                } else {
                    poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movies[index].poster_path;
                }

                let date = movies[index].release_date;

                let year = date.slice(0, 4);
                output3 += `
                 <div class="w3l-movie-gride-agile w3l-movie-gride-slider ">
                            <a href="moviedetails.php" class="hvr-sweep-to-bottom"><img src="${poster}" title="Movies Pro" class="img-responsive" alt=" " />
                                <div class="w3l-action-icon"><i class="fa fa-play-circle-o" aria-hidden="true"></i></div>
                            </a>
                            <div class="mid-1 agileits_w3layouts_mid_1_home">
                                <div class="w3l-movie-text"  onclick="movieSelected('${movies[index].id}')">
                                    <h6><a href="#">${movies[index].title}</a></h6>                            
                                </div>
                                <div class="mid-2 agile_mid_2_home">
                                    <p>${year}</p>
                                   
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="ribben one">
                                <p>NEW</p>
                            </div>
                          
                        </div>
                        
                `;
            }
            $('#trend4').html(output3);




            let output4 = '';
            for (let index = 16; index < 20; index++) {
                if (movies[index].poster_path === null) {
                    poster = "../image/default-movie.png";
                } else {
                    poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movies[index].poster_path;
                }

                let date = movies[index].release_date;

                let year = date.slice(0, 4);
                output4 += `
                 <div class="w3l-movie-gride-agile w3l-movie-gride-slider ">
                            <a href="moviedetails.php" class="hvr-sweep-to-bottom"><img src="${poster}" title="Movies Pro" class="img-responsive" alt=" " />
                                <div class="w3l-action-icon"><i class="fa fa-play-circle-o" aria-hidden="true"></i></div>
                            </a>
                            <div class="mid-1 agileits_w3layouts_mid_1_home">
                                <div class="w3l-movie-text"  onclick="movieSelected('${movies[index].id}')">
                                    <h6><a href="#">${movies[index].title}</a></h6>                            
                                </div>
                                <div class="mid-2 agile_mid_2_home">
                                    <p>${year}</p>
                                   
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="ribben one">
                                <p>NEW</p>
                            </div>
                          
                        </div>
                        
                `;
            }
            $('#trend5').html(output4);
            // $.each(movies, (index, movie) => {

            //     if (movie.poster_path === null) {
            //         poster = "image/default-movie.png";
            //     } else {
            //         poster = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" + movie.poster_path;
            //     }

            //     let date = movie.release_date;

            //     let year = date.slice(0, 4);
            //     output += `
            //             <div class="col-md-3 box">
            //               <div class="movieBox">
            //                 <img src="${poster}" alt="poster" width="210" height="315" class="img">
            //                 <div class="browse-movie-bottom">
            //                     <a href="#" onclick="movieSelected('${movie.id}')" class="browse-movie-title">${movie.title}</a>
            //                     <div class="browse-movie-year">${year}</div>
            //                     <button type="submit" class="button" onclick="movieSelected('${movie.id}')">Movie Details</button>
            //                 </div>
            //                 </div>
            //             </div>
            //     `;
            //     if (index < 4) {
            //         $('#topMovies1').html(output);
            //     }
            //     else if (index < 8) {
            //         $('#topMovies2').html(output);
            //     }
            //     else if (index < 12) {
            //         $('#topMovies3').html(output);
            //     }
            //     else if (index < 16) {
            //         $('#topMovies4').html(output);
            //     }
            //     else if (index < 19) {
            //         $('#topMovies5').html(output);
            //     }

            // });


            // $('#topMovies').html(output);
        })
        .catch((error) => {
            console.log(error);
        });
}





