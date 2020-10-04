 $("#fInput").keyup(function(e) {

                if (e.keyCode === 13 || e.which === 13) {

                    e.preventDefault();

                    $("#myBtn").click();
                    
                }
                
            });
