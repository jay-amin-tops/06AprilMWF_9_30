<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Task
                    </div>
                    <div class="card-body">
                        <form name="inserttodo" id="inserttodo" method="post">
                            <div class="row my-3">
                                <div class="col-md-6">
                                    <input type="text" class="form-control txt-bg-light" name="todo_title" id="todo_title">
                                </div>
                                <div class="col-md-4">
                                    <select name="status" class="form-control" id="status">
                                        <option value="">Select Status</option>
                                        <option  value="Pending">Pending</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Restart">Restart</option>
                                        <option value="Reject">Reject</option>
                                    </select>

                                </div>
                                <div class="col-md-1">
                                    <input type="submit" value="Save" class="btn btn-secondary" name="task_btn" id="task_btn">
                                </div>
                            </div>
                        </form>

                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Sr No</th>
                                    <th>Task Title</th>
                                    <th>Task Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="dispTask" class="table-light">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <button id="deletetododata">Click</button> -->
</div>
<script defer>
    $(document).ready(function() {
        // console.log("Called");
        $.ajax({
            url: "http://localhost/laravel/06AprilTTS_9_30/LectureData/06AprilMWF_9_30/API/getalltodo",
            headers: {
                "applicationkey": "786",
            },
            success: function(ResData) {
                // console.log(ResData.Data);
                var HTMLTablData = ""
                Object.keys(ResData.Data).forEach(function(key, index) {
                    // ResData[key] *= 2;
                    HTMLTablData += `<tr> <td>${ parseInt(key)+1}</td><td>${ResData.Data[key].todo_title} </td><td> <select name="status" onchange="updatetodo(this)" class="form-control" id="status">
                                        <option value="">Select Status</option>
                                        <option  ${ (ResData.Data[key].status == "Pending") ? "selected" :""} value="Pending">Pending</option>
                                        <option ${ (ResData.Data[key].status == "Completed") ? "selected" :""} value="Completed">Completed</option>
                                        <option ${ (ResData.Data[key].status == "Restart") ? "selected" :""} value="Restart">Restart</option>
                                        <option value="Reject">Reject</option>
                                    </select>${ResData.Data[key].status} </td><td> <button onclick="deletedata(this)" value="${ResData.Data[key].id}" class="deletetododata">Delete</button> </td></tr>`
                    console.log(ResData.Data[key]);
                });
                // console.log(HTMLTablData);
                $("#dispTask").html(HTMLTablData)
            }
        })
        $("#inserttodo").submit(function(event) {
            // alert("called")
            // console.log(event);
            event.preventDefault();
            var SerializeFormData = $("#inserttodo").serializeArray();
            // console.log(SerializeFormData);
            var returnArray = {};
            for (let index = 0; index < SerializeFormData.length; index++) {
                // const element = array[index];
                // console.log("inside loop");
                // console.log(SerializeFormData[index]['name']);
                returnArray[SerializeFormData[index]['name']] = SerializeFormData[index]['value']
            }
            console.log(returnArray);
            // data:{returnArray},
            $.ajax({
                url: "http://localhost/laravel/06AprilTTS_9_30/LectureData/06AprilMWF_9_30/API/add_todo_data",
                method: "POST",
                data: {
                    'FormData': returnArray
                },
                headers: {
                    "applicationkey": "786",
                },
                success: function(ResData) {
                    // console.log(ResData);
                    var HTMLTablData = ""
                    Object.keys(ResData.Data).forEach(function(key, index) {
                        HTMLTablData += `<tr> <td>${ parseInt(key)+1}</td><td>${ResData.Data[key].todo_title} </td><td>${ResData.Data[key].status} </td><td> <button onclick="deletedata(this)" value="${ResData.Data[key].id}" class="deletetododata">Delete</button> </td></tr>`
                        console.log(ResData.Data[key]);
                    });
                    // console.log("HTMLTablData",HTMLTablData);
                    $("#dispTask").html(HTMLTablData)
                    $("#todo_title").val("")
                    $("#status").val("")
                    alert("Task Inserted!")

                }

            })
        })

        // $(".deletetododata").on('click', function(event) {
        //     event.stopPropagation();
        //     event.stopImmediatePropagation();
        //     console.log("called");
        //     //(... rest of your JS code)
        // });
    })

    function deletedata(e) {
        // console.log("called", e.value);
        if (confirm("Are you Sure?")) {


            $.ajax({
                url: "http://localhost/laravel/06AprilTTS_9_30/LectureData/06AprilMWF_9_30/API/delete_todo_data",
                method: "POST",
                data: {
                    'id': e.value
                },
                headers: {
                    "applicationkey": "786",
                },
                success: function(ResData) {
                    // console.log(ResData);
                    var HTMLTablData = ""
                    Object.keys(ResData.Data).forEach(function(key, index) {
                        HTMLTablData += `<tr> <td>${ parseInt(key)+1}</td><td>${ResData.Data[key].todo_title} </td><td>${ResData.Data[key].status} </td><td> <button onclick="deletedata(this)" value="${ResData.Data[key].id}" class="deletetododata">click ${ResData.Data[key].id}</button> </td></tr>`
                        console.log(ResData.Data[key]);
                    });
                    // console.log("HTMLTablData",HTMLTablData);
                    $("#dispTask").html(HTMLTablData)
                    $("#todo_title").val("")
                    $("#status").val("")
                    alert("Task Deleted!")

                }

            })
        }
    }
    function updatetodo(e) {
        // console.log("called", e.value);

            $.ajax({
                url: "http://localhost/laravel/06AprilTTS_9_30/LectureData/06AprilMWF_9_30/API/update_todo_data",
                method: "POST",
                data: {
                    'status': e.value
                },
                headers: {
                    "applicationkey": "786",
                },
                success: function(ResData) {
                    // console.log(ResData);
                    var HTMLTablData = ""
                    Object.keys(ResData.Data).forEach(function(key, index) {
                        HTMLTablData += `<tr> <td>${ parseInt(key)+1}</td><td>${ResData.Data[key].todo_title} </td><td>${ResData.Data[key].status} </td><td> <button onclick="deletedata(this)" value="${ResData.Data[key].id}" class="deletetododata">click ${ResData.Data[key].id}</button> </td></tr>`
                        console.log(ResData.Data[key]);
                    });
                    // console.log("HTMLTablData",HTMLTablData);
                    $("#dispTask").html(HTMLTablData)
                    $("#todo_title").val("")
                    $("#status").val("")
                    // alert("Task Deleted!")

                }

            })
        
    }
</script>
<!-- Recent Sales End -->