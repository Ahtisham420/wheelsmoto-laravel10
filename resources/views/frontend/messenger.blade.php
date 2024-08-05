@include('frontend.partials.header')

<div class="container careers-body  messengerscreen">
    <div class="row messenger">
        <div class="col-12 col-sm-4 leftsidebar " id="leftsidebar">
            <div class="row">

                <div class="col-12 allconeversationdiv">
                    <div class="input-group  m-0" id="chat" style="padding-top: 15px;">
                        <input type="text" id="search_username" class="form-control" placeholder=" Search  username" aria-label="Search  username" aria-describedby="basic-addon2">
                        <div class="input-group-append" style="background: transparent;">
                            <span class="input-group-text" id="basic-addon2"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-4 serchbtn">
                    <button type="submit"></button>
                </div> -->
                <div class="col-12 p-0">
                    <hr>
                </div>
            </div>


            <div class="row user-message-list" id="userprofile">

                <div class="col-12  single-userchat" >
                    <div class="row m-0">
                        <div class="col-12 p-0">
                            <div class="row m-0 profilenameandpic " style="cursor: pointer;">
                                <div class="col-2 col-sm-2 pimgdiv pl-0 npimgdiv">
                                    <div class="pimg1" style="position: relative;">

                                        <img src="{{ config('app.ui_asset_url').'frontend/img/footbal.png' }}" alt="Card image cap">


                                        <div class="offlineuser"></div>

                                    </div>
                                </div>
                                <div class="col-10 mymessage newmymessage p-0">
                                    <div class="row">
                                        <div class="col-8 col-sm-12 col-md-12 col-lg-8 mymessage ">
                                            <h3 class="username">Ahmad</h3>
                                        </div>
                                        <div class="col-4 col-sm-12 col-md-12 col-lg-4 messagetime pr-0" style="margin-left: 0; float:right;">
                                            <p> 4 minutes ago</p>
                                        </div>
                                        <div class="col-12 mymessage" style="padding-right: 0;">
                                            <p class="m-0">Hello there is asif how are you</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <hr>

                </div>
                {{-- <div class="col-12">
                    <div class="row m-0">
                        <div class="col-12 p-0">
                            <div class="row m-0 profilenameandpic " style="cursor: pointer;">
                                <div class="col-2 col-sm-2 pimgdiv npimgdiv">
                                    <div class="pimg1" style="position: relative;">
                                        <img src="{{config('app.ui_asset_url').'frontend/images/teacher3.png'}}" alt="Card image cap">
                <div class="activeuser"></div>

            </div>
        </div>
        <div class="col-10 mymessage p-0">
            <div class="row">
                <div class="col-8 mymessage ">
                    <h3> Rentmoe User </h3>
                </div>
                <div class="col-4  messagetime p-0" style="margin-left: 0;">
                    <p>2 weeks ago</p>
                </div>
                <div class="col-12 mymessage" style="padding-right: 0;">
                    <p class="m-0">Me: i am rentmoe user and here for.....</p>
                </div>
            </div>

        </div>
    </div>
</div>

</div>
<hr>

</div>
--}}


</div>
</div>
<div class="col-12 col-sm-8 leftsidebar mbleftsidebar chat_content" >
    <div class="col-12">
        <div class="row">
            <div class=" backarrowdiv"><i class="fa fa-arrow-left" id="backarrow"></i></div>
            <div class="col-12 messengerusername newmessagetime messagetime" style="position: relative;">
                <div class="online" ></div>
                <h2 class="m-0 username">Anas</h2>
                <p class="m-0 offline"> <span></span></p>
                {{-- <div>
                    <a class="btn createanoffer" data-toggle="modal" data-target="#createoffermodal"> Create an offer</a>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="col-12 p-0">
        <hr>
    </div>
    <div class="col-12 singleMessagesDiv" style="overflow-y: auto;max-height:45vh;min-height:45vh;overflow-x:hidden;">
        <div class="row messageshow">
                    <div class=" col-12 col-sm-8" style="margin-top: 25px;">
                        <div class="row m-0">
                            <div class="col-12 p-0">
                                <div class="row profilenameandpic">
                                    <div class="col-2  otherchatimgdiv">
                                        <div class="pimgother">
                                            <img src="{{config('app.ui_asset_url').'frontend/img/footbal.png'}}" alt="Card image cap">
    </div>
</div>
<div class="col-8  othermessage p-0">
    <p>jsdjfkhdfkghs gsdkfgh sdkhg wk hsdkhsd gksdhgklsd hgsh sdkfhgsd gklsdh gklsdh gmmktimegkjl hashs kfj
        skd hashf gjkgh
        sdfg jkghsdfg
        s sdfg gjkghfgks dghklgh kldfhgdfg
        sd khsdg ysdf89ghsdfg
        fphsgdf'glgjjkdfh
        gksdghidfhgsdlg
        dfg;df hgkgh;gmmktimes dfkdfghisdfhg
        sdfkgh g
        kdhg sdfgdfkghsd
        sdgksdghsd
        d ggh fgetcdf ksdfg hsdflns ddfgdfg sdhvjkhsdhdf

    </p>

</div>
</div>
</div>

</div>
</div>
</div>
<div class="row d-flex flex-row-reverse">
    <div class="col-12 col-sm-8" style="margin-top: 25px;">
        <div class="row m-0">

            <div class="col-sm-10 col-12 othermessage p-0">
                <p>jsdjfkhdfkghs gsdkfgh sdkhg wk hsdkhsd gksdhgklsd hgsh sdkfhgsd gklsdh gklsdh gmmktimegkjl hashs kfj
                    skd hashf gjkgh
                    sdfg jkghsdfg
                    s sdfg gjkghfgksdghklghkldfhgdfg
                    sd khsdg ysdf89ghsdfg


                </p>

            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-2  otherchatimgdiv otherchatimgdivmbl">
                <div class="pimgother">
                    <img src="{{config('app.ui_asset_url').'frontend/img/dp.jpg'}}" alt="Card image cap">

                </div>
            </div>

        </div>
    </div>
</div>
</div>
<div class="col-12 p-0 messagarea">
    <div class="col-12 s1t typing" style="display: none">
        <p></p>
    </div>
    <div class="row m-0">
        <div class="col-12 mobilepdnig">
            <form>
                <div class="form-row">
                    <div class="form-group col-9 col-sm-9 msgtxtarea  col-md-10 col-lg-11">
                        <textarea class="form-control" id="emojitext" rows="1" style="resize: none;"></textarea>
                    </div>

                    <div class="form-group col-3 msgsndarea col-sm-3 col-md-2 col-lg-1 sendbtndiv"> <button type="submit" class="btn createofferbtn">Send</button></div>
                </div>
            </form>

        </div>
        <div class="col-12">

        </div>
    </div>

</div>

</div>
</div>
</div>
@include('frontend.partials.footer')
