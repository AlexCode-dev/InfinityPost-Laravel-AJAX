<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Infinity Posts</title>
    <link rel="icon" href="{{URL::asset('/infinityImgs/blog.png')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" /> @vite(['resources/css/post.css'])
</head>

<body>

    <section class="principal d-flex row w-100 h-100">
        <div class="head">
            <button type="button" href="#" class="btnPosts" data-bs-toggle="modal" data-bs-target="#formModal">
                ADD NEW POST</button>

        </div>

        {{--Modal Create POST--}}

        <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background: #8044FF; color:#ffff;">
                        <h5 class="modal-title" id="exampleModalLabel"> <i class="bi bi-postcard"></i> NEW POST</h5>

                    </div>


                    <form action="#" method="POST" id="add_post_form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body p-4 bg-light">
                            <div class="row">
                                <div class="col-lg">
                                    <label for="ownerPost">Owner Post</label>
                                    <input type="text" name="ownerPost" class="form-control" placeholder="Your Name" required>
                                </div>

                            </div>
                            <div class="my-2">
                                <label for="descriptionPost">Description (only 100 words)</label>
                                <textarea name="descriptionPost" class="form-control" placeholder="Describe your post here..." required></textarea>
                            </div>
                            <div class="my-2 casirow">
                                <label for="imgpost">Select Image</label>
                                <div class="col-2">
                                    <img class="preview_img" id="preview_img" src="{{URL::asset('/postImgs/DefaultImage.jpg')}}">
                                </div>
                                <div class="col-10">
                                    <div class="file-upload text-secondary">
                                        <input type="file" name="imgpost" class="image" required>
                                        <span class="fs-4 fw-2">Choose file</span>
                                        <span>or drag and drop file here "Only images"</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2" id="tags">
                                <label for="tags">Select tags</label>
                                <select class="form-select" name="tags[]" id="tagsPost" class="form-control" data-placeholder="Choose anything" multiple>
                                    <option value="Economia">Economia</option>
                                    <option value="Actualidad">Actualidad</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="add_post_btn" class="btn btn-primary" style="background-color:#8044FF; color:#ffff; border: none;">Add Post</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>


        {{--Modal Edit post--}}
        <div class="modal fade" id="editformModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background: #8044FF; color:#ffff;">
                        <h5 class="modal-title" id="exampleModalLabel"> <i class="bi bi-postcard"></i> NEW POST</h5>

                    </div>


                    <form action="#" method="POST" id="edit_notes_form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="note_id" id="note_id">
                        <input type="hidden" name="img_note" id="img_note">
                        <div class="modal-body p-4 bg-light">
                            <div class="row">
                                <div class="col-lg">
                                    <label for="ownerPost">Owner Post</label>
                                    <input type="text" id="ownerPost" name="ownerPost" class="form-control" placeholder="Your Name" required>
                                </div>

                            </div>
                            <div class="my-2">
                                <label for="descriptionPost">Description (only 100 words)</label>
                                <textarea id="descriptionPost" name="descriptionPost" class="form-control" placeholder="Describe your post here..." required></textarea>
                            </div>
                            <div class="my-2 casirow">
                                <label for="imgpost">Select Image</label>
                                <div class="col-2">
                                    <img class="preview_img" id="preview_img" src="{{URL::asset('/postImgs/DefaultImage.jpg')}}">
                                </div>
                                <div class="col-10">
                                    <div class="file-upload text-secondary">
                                        <input type="file" id="imgpost" name="imgpost" class="image">
                                        <span class="fs-4 fw-2">Choose file</span>
                                        <span>or drag and drop file here "Only images"</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2" id="tags">
                                <label for="tags">Select tags</label>
                                <select class="form-select" name="tags[]" id="tagsPostedit" class="form-control" data-placeholder="Choose anything" multiple>
                                    <option value="Economia">Economia</option>
                                    <option value="Actualidad">Actualidad</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="edit_notes_btn" class="btn btn-primary" style="background-color:#8044FF; color:#ffff; border: none;">Save Post</button>
                            <button type="submit" id="delete_notes_btn" class="btn btn-primary deleteIcon" style="background-color:#ff4466; color:#ffff; border: none;">Delete</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>



        {{--section post--}}
        <div class="posts">
            @foreach($notes as $note)
            @php
            $stringTags =$note->tags;
            $tagsArray = explode(",", $stringTags);
            @endphp
            <div class="post mt-2">
                <div class="post-sect">
                    <img src="{{ asset('storage/images').'/'.$note->imgpost }}" class="imagenup" alt="">
                    <div class="buttonsPost ">
                        <button type="button" id="{{$note->id}}" class="btnPosts yellow editIcon" href="#" data-bs-toggle="modal" data-bs-target="#editformModal">EDIT POST</button>

                        <button type="button" id="{{$note->id}}" class="btnPosts yellow deleteIcon" href="#">DELETE POST</button>

                    </div>
                    <h2 class="tittlePost">{{$note->ownerpost}}</h2>
                    <p class="DesciptionPost">{{$note->descriptionpost}}</p>

                    <div class="tags d-flex">
                        @foreach ($tagsArray as $tag)
                        <h4 class="tagPost">{{ str_replace(',', '', $tag) }}</h4>
                        @endforeach


                    </div>

                </div>
             

            </div>
            @endforeach
        </div>





    </section>

    {{--Jquery and boostrap--}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    {{--sweetalert2--}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{--select2--}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>

    <script>

         function recargar(){
            setTimeout(function() {
                            location.reload(); // Recarga la página después de 2 segundos (2000 ms)
                        }, 2000);
        }


        //drag and drop
        $(document).ready(function() {
            $("input.image").change(function() {
                var file = this.files[0];
                var url = URL.createObjectURL(file);
                $(this).closest(".casirow").find(".preview_img").attr("src", url);

            })
        });

        //Select2
        $('#tagsPost').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,

        });
        //select Edit
        $('#tagsPostedit').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,

        });
        //create
        $("#add_post_form").submit(function(e) {
            e.preventDefault();
            const fdata = new FormData(this);
            $("#add_partner_btn").text("Adding...");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('store')}}",
                method: 'post',
                data: fdata,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(res) {
                    if (res.status == 200) {
                        swal.fire(
                            'Added',
                            'Partner Added Correctly',
                            'success'
                        )
                       recargar();

                    }
                    $("#add_post_form")[0].reset();
                    $("#add_post_btn").text("Add");
                    $('#formModal').modal('hide');

                }

            });
        });

        //edit (mostrar datos en input)
        $(document).on('click', '.editIcon', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            console.log(id);


            $.ajax({
                url: "{{ route('showhowdata')}}",
                method: 'get',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(res) {
                    $("#ownerPost").val(res.ownerpost);
                    $("#descriptionPost").val(res.descriptionpost);
                    console.log(res.imgpost)
                    let img = res.imgpost;
                    $("#img_note").val(res.imgpost);
                    console.log('{{ asset("storage/images") }}' + '/' + res.imgpost)
                    let tags = (res.tags).split(',');
                    for (let i = 0; i < tags.length; i++) {
                        // var option = $("<option>", { text: tags[i] });
                        $("#tagsPostedit").val(tags[i]).trigger('change.select2');

                    }
                    $("#note_id").val(res.id);
                    console.log(res.id)
                    console.log(tags)
                    $(".preview_img").attr("src", '{{ asset("storage/images") }}' + '/' + res.imgpost);
                }

            });
        });



        //update datos (edit II)
        $("#edit_notes_form").submit(function(e) {
            e.preventDefault();
            const fdata = new FormData(this);
            $("#edit_notes_btn").text("Adding...");
            console.log(fdata.values)
            $.ajax({
                url: "{{ route('update')}}",
                method: 'post',
                data: fdata,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(res) {
                    if (res.status == 200) {
                        swal.fire(
                            'Updated',
                            'Note Added Correctly',
                            'success'
                        )
                        recargar();

                    }
                    $("#edit_notes_form")[0].reset();
                    $("#edit_notes_btn").text("Update");
                    $('#editformModal').modal('hide');

                }

            });
        });

        //Delete
        $(document).on('click', '.deleteIcon', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            let csrf = '{{ csrf_token() }}';
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('delete')}}",
                        method: 'delete',
                        data: {
                            id: id,
                            _token: csrf
                        },
                        success: function(response) {
                            console.log(response);
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            recargar();

                        }
                    });
                }
            })
        });
    </script>












</body>

</html>