@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-6">
                <h2>Add Business</h2>
                <form method="post" action="{{ route('businesses.store') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="business-name">Business Name <span class="required">*</span></label>
                        <input type="text" name="name" id="business-name" class="form-control" required
                        spellcheck="false" placeholder="Enter business name">
                    </div>

                    <div class="form-group">
                        <label for="business-email">Business Email <span class="required">*</span></label>
                        <input type="text" name="email" id="business-email" class="form-control" required
                        spellcheck="false" placeholder="Enter business email">
                    </div>

                    <div class="form-group">
                        <label for="business-location">Location <span class="required">*</span></label>
                        <input type="text" name="location" id="business-location" class="form-control" required
                        spellcheck="false" placeholder="Enter business location">
                    </div>

                    <div class="form-group">
                        <label for="business-phone">Enter phone number</label>
                        <input type="tel" name="phone" id="business-phone" class="form-control" required
                          placeholder="Enter telphone">
                    </div>

                    <!-- <div class="form-group category-field" id="cat">
                        <label for="business-category">Add category <span class="required">*</span></label>
                        <input type="text" name="category1" id="business-category" class="form-control" required
                        spellcheck="false" placeholder="Enter business category">
                    </div> -->
                    <!-- <div class="form-group">
                        <button class="btn btn-primary" onclick="addNew()">Add anoter category</button>
                    </div> -->

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- 
    <script>
    
        var counter = 1;
        
        function addNew() {
            // $(formFieldsString.replace('[0]', '[' + (++counter) + ']')).appendTo('#category-field');
            document.getElementById("cat").innerHTML += '<label for="business-category">Add category <span class="required">*</span></label> \
                        <input type="text" name="category'+(++counter)+'" id="business-category" class="form-control" required \
                        spellcheck="false" placeholder="Enter business category">';
        }
    </script> -->

@endsection