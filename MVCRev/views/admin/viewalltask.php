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

                        <div class="row my-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control txt-bg-light" name="task_title" id="task_title">
                            </div>
                            <div class="col-md-4">
                                <select name="status" class="form-control"  id="status">
                                    <option value="">Select Status</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Restart">Restart</option>
                                    <option value="Reject">Reject</option>
                                </select>    
                            
                            </div>
                            <div class="col-md-1">
                                <input type="button" value="Save" class="btn btn-secondary" name="task_btn" id="task_btn">
                            </div>
                        </div>

                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Sr No</th>
                                    <th>Task Title</th>
                                    <th>Task Status</th>
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
</div>
<script>
    $(document).ready(function() {
        // console.log("Called");
        $.ajax({
            url: "http://localhost/laravel/06AprilTTS_9_30/LectureData/06AprilMWF_9_30/API/getalltodo",
            headers: {
                "applicationkey": "786",
            },
            success: function(ResData) {
                console.log(ResData.Data);
                var HTMLTablData = ""
                Object.keys(ResData.Data).forEach(function(key, index) {
                    // ResData[key] *= 2;
                    HTMLTablData+=`<tr> <td>${ parseInt(key)+1}</td><td>${ResData.Data[key].todo_title} </td><td>${ResData.Data[key].status} </td></tr>`
                    console.log(ResData.Data[key]);
                });
                console.log(HTMLTablData);
                $("#dispTask").html(HTMLTablData)
            }

        })
    })
</script>
<!-- Recent Sales End -->