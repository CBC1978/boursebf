@extends('layouts.app')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
        <div class="chat-application">
            <!-- -------------------------------------------------------------- -->
            <!-- Left Part  -->
            <!-- -------------------------------------------------------------- -->
            <div class="left-part bg-white fixed-left-part user-chat-box">
                <!-- Mobile toggle button -->
                <a
                    class="
                ti-menu ti-close
                btn btn-success
                show-left-part
                d-block d-md-none
              "
                    href="javascript:void(0)"
                ></a>
                <!-- Mobile toggle button -->
                <div class="p-3">
                    <h4>Messagerie</h4>
                </div>
                <div class="scrollable position-relative" style="height: 100%">
                    <div class="p-3 border-bottom">
{{--                        <h5 class="card-title">Rechercher un contact</h5>--}}
                        <form>
                            <div class="searchbar">
                                <input
                                    class="form-control"
                                    type="text"
                                    placeholder="Rechercher un contact"
                                />
                            </div>
                        </form>
                    </div>
                    <ul class="mailbox list-style-none app-chat">
                        <li>
                            <div class="message-center chat-scroll chat-users">
                                <a
                                    href="javascript:void(0)"
                                    class="
                                        chat-user
                                        message-item
                                        align-items-center
                                        border-bottom
                                        px-3
                                        ps-2
                                      "
                                    id="chat_user_1"
                                    data-user-id="1"
                                >
                                    <span class="user-img position-relative d-inline-block">
                                        <img
                                            src="src/assets/images/users/1.jpg"
                                            alt="user"
                                            class="rounded-circle w-50"
                                        />
                                        <span
                                            class="
                                            profile-status
                                            online
                                            rounded-circle
                                            pull-right
                                          "
                                        ></span>
                                  </span>
                                    <div class="mail-contnet w-250 d-inline-block v-middle ps-3">
                                        <h5
                                            class="message-title mb-0 mt-1 fs-3 fw-bold"
                                            data-username="Pavan kumar"
                                        >
                                            {{ $offer->announce->company->company_name }}
                                        </h5>
                                        <span
                                            class="
                                                fs-2
                                                text-nowrap
                                                d-block
                                                time
                                                text-truncate
                                                fw-normal
                                                text-muted
                                                mt-1
                                              "
                                        >{{ $offer->announce->origin->libelle.' - '.$offer->announce->destination->libelle}}</span
                                        >
                                        <span
                                            class="fs-2 text-nowrap d-block subtext text-muted"
                                        >{{ date("d/m/Y", strtotime($offer->announce->limit_date)) }}</span
                                        >
                                    </div>
                                </a>
                                <!-- Message -->

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- -------------------------------------------------------------- -->
            <!-- End Left Part  -->
            <!-- -------------------------------------------------------------- -->
            <!-- -------------------------------------------------------------- -->
            <!-- Right Part  Mail Compose -->
            <!-- -------------------------------------------------------------- -->
            <div class="right-part chat-container">
                <div class="chat-box-inner-part">
                    <div class="chat-not-selected">
                        <div class="text-center">
                  <span class="display-5 text-info"
                  ><i data-feather="message-square" class="feather-xl"></i
                      ></span>
                            <h5 class="font-weight-medium">Ouvrir une discusion sur une offre dans la liste</h5>
                        </div>
                    </div>
                    <div class="card chatting-box mb-0">
                        <div class="card-body">
                            <div class="chat-meta-user pb-3 border-bottom">
                                <div class="current-chat-user-name">
                                      <span>
                                            <img
                                                src="src/assets/images/users/1.jpg"
                                                alt="dynamic-image"
                                                class="rounded-circle"
                                                width="45"
                                            />
                                            <span class="name fw-bold ms-2"></span>
                                      </span>
                                </div>
                            </div>
                            <!-- <h4 class="card-title">Chat Messages</h4> -->
                            <div
                                class="chat-box scrollable"
                                style="height: calc(100vh - 300px)"
                            >
                                <!--User 1 -->
                                <ul class="chat-list chat" data-user-id="1">
                                    @if( count($chats) > 0)
                                        @foreach($chats as $chat)
                                            @if( $chat->company != $offer->company )
                                                <!--chat Row -->
                                                <li class="mt-4">
                                                    <div class="chat-img d-inline-block align-top">
                                                        <img
                                                            src="src/assets/images/users/1.jpg"
                                                            alt="user"
                                                            class="rounded-circle"
                                                        />
                                                    </div>

                                                    <div class="chat-content ps-3 d-inline-block">
                                                        <h5 class="text-muted fs-3 font-weight-medium">
                                                            {{ $chat->user->name.' '.$chat->user->first_name}}
                                                        </h5>
                                                        <div
                                                            class="
                                                              box
                                                              mb-2
                                                              d-inline-block
                                                              text-dark
                                                              message
                                                              font-weight-medium
                                                              fs-3
                                                              bg-light-info
                                                            "
                                                        >

                                                           {{ $chat->message }}
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="
                                                            chat-time
                                                            d-inline-block
                                                            text-end
                                                            fs-2
                                                            font-weight-medium
                                                          "
                                                    >
                                                        {{date("d/m/Y H:i", strtotime($chat->created_at))}}
                                                    </div>

                                                </li>
                                            @else
                                                <li class="odd mt-4">
                                                    <div class="chat-content ps-3 d-inline-block text-end">
                                                        <h5 class="text-muted fs-3 font-weight-medium">
                                                            {{ $chat->user->name.' '.$chat->user->first_name}}
                                                        </h5>
                                                        <div
                                                            class="
                                                              box
                                                              mb-2
                                                              d-inline-block
                                                              text-dark
                                                              message
                                                              font-weight-medium
                                                              fs-3
                                                              bg-light-inverse
                                                            "
                                                        >
                                                            {{ $chat->message }}
                                                        </div>
                                                        <br />
                                                    </div>
                                                    <div
                                                        class="
                                                            chat-time
                                                            d-inline-block
                                                            text-end
                                                            fs-2
                                                            font-weight-medium
                                                          "
                                                    >
                                                        {{date("d/m/Y H:i", strtotime($chat->created_at))}}
                                                    </div>
                                                </li>

                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div
                            class="
                                card-body
                                border-top border-bottom
                                chat-send-message-footer
                              "
                        >
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-field mt-0 mb-0">
                                        <input type="hidden" value="{{$offer->id}}" id="offer_id">
                                        <input type="hidden" value="{{ csrf_token() }}" id="_token">
                                        <input
                                            id="textarea1"
                                            placeholder="Entrer votre message"
                                            class="message-type-box form-control border-0"
                                            type="text"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="chat-windows"></div>
@endsection


@section('script')
<script src="src/dist/js/pages/chat/chat.js"></script>
@endsection
