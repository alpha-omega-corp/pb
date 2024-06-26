<x-modal.open
    :name="ModalName::APP_POST"
    :type="ModalType::CREATE"
    :custom-color="AppColor::PRIMARY"
    :icon="$createIcon"
    :fit="true"
    :radius="false"
    :background="true"
/>

<div class="admin-blog-container">
    @foreach($posts as $post)
        <div class="d-flex gap-2">
            <div class="admin-post-card">

                <div class="admin-post">
                    <div class="admin-post-header">
                        <a href="{{route(__('route.post'), ['post' => $post->locale])}}" target="_blank">
                            <h6 class="admin-post-title">{{$post->locale->slug}}</h6>
                        </a>

                        <div class="d-flex align-items-center">
                            <form method="POST" action="{{route('admin.post.status', ['post' => $post])}}">
                                @csrf
                                @method('PUT')

                                <button type="submit" class="btn tippy"
                                        data-tippy-content="{{$post->status ? 'private' : 'public'}}">
                                    @svg($post->status ? 'heroicon-o-arrow-down' : 'heroicon-o-arrow-up', $post->status ? 'text-danger' : 'text-primary')
                                </button>
                            </form>

                            @include('app.admin.content.posts.partials.edit', ['item' => $post])
                            @include('app.admin.content.posts.partials.delete', ['item' => $post])
                        </div>
                    </div>

                    <div class="admin-post-content">
                        <p>{{$post->locale->title}}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>


@include('app.admin.content.posts.partials.create')
