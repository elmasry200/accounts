@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ action('AccountController@saveAccount') }}" method="POST" accept-charset="utf-8">
       @csrf
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="companyName">الشركة:</label>
            <input type="text" class="form-control" readonly placeholder="دبلومات لتأجير السيارات">
          </div>    
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="arabicName">الإسم العربى:</label>
            <input type="text" class="form-control" id="arabicName" name="ar_name" placeholder="الإسم العربي">
          </div>
          <div class="form-group col-md-6">
            <label for="englishName">الإسم الإنجليزى:</label>
            <input type="text" class="form-control" id="englishName" name="en_name" placeholder="الإسم الإنجليزى">
          </div>
        </div>
            <div class="form-row">  
              <div class="form-group col-md-3">
                <label for="natureAccount">الطبيعة:</label>
                <select id="natureAccount" class="form-control" name="natural_account">
                  <option selected>الطبيعة</option>
                  <option value="0">مدين</option>
                  <option value="1">دائن</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="inputList">القائمة:</label>
                <select id="inputList" class="form-control" name="list">
                  <option selected>القائمة</option>
                  <option value="0">الميزانية العمومية</option>
                  <option value="1">الأرباح و الخسائر</option>
                  <option value="2">كلاهما</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="level">المستوى:</label>
                <select id="level" class="form-control" name="level">
                  <option selected></option>
                  <option value="1">المستوى الأول</option>
                  <option value="2">المستوى الثانى</option>
                  <option value="3">المستوى الثالث</option>
                  <option value="4">المستوى الرابع</option>
                  <option value="5">المستوى الخامس</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="parentAccount">الأب:</label>
                <select id="parentAccount" class="form-control" name="parent_id">
                  <option value="0">Choose Parent Account</option>              
                </select>
              </div>
        </div>
        <div class="row justify-content-center m-5">
              <button type="submit" class="btn btn-primary">إضافة</button>
        </div>
      </form>
</div>


@endsection

