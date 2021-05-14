<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getPosts(){
        $posts = [[
            'id' => 1,
            'title' => 'One blog post',
            'description' => 'Aliquam erat volutpat. Morbi malesuada sem id malesuada imperdiet. Suspendisse euismod odio quam, vitae rhoncus enim fermentum quis. Suspendisse scelerisque venenatis magna sit amet imperdiet. Integer ut pretium risus. Aenean neque nulla, viverra sit amet consequat et, elementum a orci. Morbi consectetur pulvinar elit ut mollis.',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sed nulla eu urna commodo euismod. Duis nec rutrum quam. Sed eget volutpat lorem, eu lobortis nunc. Sed ut volutpat odio, semper fermentum ex. Sed efficitur, nibh a posuere iaculis, turpis enim aliquet lectus, nec aliquet risus odio ac sem. In suscipit pharetra ligula, a fermentum nisi suscipit id. Donec sed nisi ornare, blandit mauris eget, condimentum nulla. Nullam dapibus turpis sed tempor iaculis. Cras vel porta tellus.

            Nam viverra dui at euismod accumsan. Nunc euismod eros at lectus suscipit, ut blandit dolor interdum. Sed ac turpis ultrices, egestas mauris vitae, lobortis nibh. Etiam a feugiat lorem, et lacinia tellus. Sed turpis massa, finibus quis varius at, consectetur sit amet massa. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse lacinia felis eget sapien consequat, sit amet finibus nulla scelerisque. Nulla quis ex in sem condimentum maximus non in neque. Morbi luctus nisi ac posuere tempor. Vestibulum egestas, tellus eu congue malesuada, erat purus auctor risus, at elementum lorem risus dignissim mauris. In ultrices tempus risus, finibus suscipit urna mollis ac. Phasellus ligula metus, ultrices et imperdiet a, euismod vel nibh. Cras aliquam feugiat sem, a convallis purus vehicula a.
            
            Donec tincidunt sodales ex, ornare mollis neque sagittis eu. Duis id consequat eros. Phasellus ullamcorper elit vel ipsum pharetra, ut pellentesque mi blandit. Praesent quis turpis turpis. Vivamus eu pellentesque nibh. Suspendisse fringilla lorem tellus, vel laoreet ipsum varius eget. Cras egestas purus non diam tincidunt ultricies. Etiam vel magna quis eros facilisis mattis. In hac habitasse platea dictumst. Curabitur ornare neque ac lectus placerat varius. Vivamus et accumsan nulla, vitae faucibus massa. Maecenas rutrum erat id est tincidunt, sed lacinia massa dapibus.',
            'created_at' => '02-05-2021',
            'author' => 'Shepard',
        ],
        [
            'id' => 2,
            'title' => 'Two blog post',
            'description' => 'Aliquam erat volutpat. Morbi malesuada sem id malesuada imperdiet. Suspendisse euismod odio quam, vitae rhoncus enim fermentum quis. Suspendisse scelerisque venenatis magna sit amet imperdiet. Integer ut pretium risus. Aenean neque nulla, viverra sit amet consequat et, elementum a orci. Morbi consectetur pulvinar elit ut mollis.',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sed nulla eu urna commodo euismod. Duis nec rutrum quam. Sed eget volutpat lorem, eu lobortis nunc. Sed ut volutpat odio, semper fermentum ex. Sed efficitur, nibh a posuere iaculis, turpis enim aliquet lectus, nec aliquet risus odio ac sem. In suscipit pharetra ligula, a fermentum nisi suscipit id. Donec sed nisi ornare, blandit mauris eget, condimentum nulla. Nullam dapibus turpis sed tempor iaculis. Cras vel porta tellus.

            Nam viverra dui at euismod accumsan. Nunc euismod eros at lectus suscipit, ut blandit dolor interdum. Sed ac turpis ultrices, egestas mauris vitae, lobortis nibh. Etiam a feugiat lorem, et lacinia tellus. Sed turpis massa, finibus quis varius at, consectetur sit amet massa. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse lacinia felis eget sapien consequat, sit amet finibus nulla scelerisque. Nulla quis ex in sem condimentum maximus non in neque. Morbi luctus nisi ac posuere tempor. Vestibulum egestas, tellus eu congue malesuada, erat purus auctor risus, at elementum lorem risus dignissim mauris. In ultrices tempus risus, finibus suscipit urna mollis ac. Phasellus ligula metus, ultrices et imperdiet a, euismod vel nibh. Cras aliquam feugiat sem, a convallis purus vehicula a.
            
            Donec tincidunt sodales ex, ornare mollis neque sagittis eu. Duis id consequat eros. Phasellus ullamcorper elit vel ipsum pharetra, ut pellentesque mi blandit. Praesent quis turpis turpis. Vivamus eu pellentesque nibh. Suspendisse fringilla lorem tellus, vel laoreet ipsum varius eget. Cras egestas purus non diam tincidunt ultricies. Etiam vel magna quis eros facilisis mattis. In hac habitasse platea dictumst. Curabitur ornare neque ac lectus placerat varius. Vivamus et accumsan nulla, vitae faucibus massa. Maecenas rutrum erat id est tincidunt, sed lacinia massa dapibus.',
            'created_at' => '24-11-2021',
            'author' => 'Liara',
        ],
        [
            'id' => 3,
            'title' => 'And another one',
            'description' => 'Aliquam erat volutpat. Morbi malesuada sem id malesuada imperdiet. Suspendisse euismod odio quam, vitae rhoncus enim fermentum quis. Suspendisse scelerisque venenatis magna sit amet imperdiet. Integer ut pretium risus. Aenean neque nulla, viverra sit amet consequat et, elementum a orci. Morbi consectetur pulvinar elit ut mollis.',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sed nulla eu urna commodo euismod. Duis nec rutrum quam. Sed eget volutpat lorem, eu lobortis nunc. Sed ut volutpat odio, semper fermentum ex. Sed efficitur, nibh a posuere iaculis, turpis enim aliquet lectus, nec aliquet risus odio ac sem. In suscipit pharetra ligula, a fermentum nisi suscipit id. Donec sed nisi ornare, blandit mauris eget, condimentum nulla. Nullam dapibus turpis sed tempor iaculis. Cras vel porta tellus.

            Nam viverra dui at euismod accumsan. Nunc euismod eros at lectus suscipit, ut blandit dolor interdum. Sed ac turpis ultrices, egestas mauris vitae, lobortis nibh. Etiam a feugiat lorem, et lacinia tellus. Sed turpis massa, finibus quis varius at, consectetur sit amet massa. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse lacinia felis eget sapien consequat, sit amet finibus nulla scelerisque. Nulla quis ex in sem condimentum maximus non in neque. Morbi luctus nisi ac posuere tempor. Vestibulum egestas, tellus eu congue malesuada, erat purus auctor risus, at elementum lorem risus dignissim mauris. In ultrices tempus risus, finibus suscipit urna mollis ac. Phasellus ligula metus, ultrices et imperdiet a, euismod vel nibh. Cras aliquam feugiat sem, a convallis purus vehicula a.
            
            Donec tincidunt sodales ex, ornare mollis neque sagittis eu. Duis id consequat eros. Phasellus ullamcorper elit vel ipsum pharetra, ut pellentesque mi blandit. Praesent quis turpis turpis. Vivamus eu pellentesque nibh. Suspendisse fringilla lorem tellus, vel laoreet ipsum varius eget. Cras egestas purus non diam tincidunt ultricies. Etiam vel magna quis eros facilisis mattis. In hac habitasse platea dictumst. Curabitur ornare neque ac lectus placerat varius. Vivamus et accumsan nulla, vitae faucibus massa. Maecenas rutrum erat id est tincidunt, sed lacinia massa dapibus.',
            'created_at' => '12-02-2021',
            'author' => 'Grunt',
        ],
        [
            'id' => 4,
            'title' => 'The last one',
            'description' => 'Aliquam erat volutpat. Morbi malesuada sem id malesuada imperdiet. Suspendisse euismod odio quam, vitae rhoncus enim fermentum quis. Suspendisse scelerisque venenatis magna sit amet imperdiet. Integer ut pretium risus. Aenean neque nulla, viverra sit amet consequat et, elementum a orci. Morbi consectetur pulvinar elit ut mollis.',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sed nulla eu urna commodo euismod. Duis nec rutrum quam. Sed eget volutpat lorem, eu lobortis nunc. Sed ut volutpat odio, semper fermentum ex. Sed efficitur, nibh a posuere iaculis, turpis enim aliquet lectus, nec aliquet risus odio ac sem. In suscipit pharetra ligula, a fermentum nisi suscipit id. Donec sed nisi ornare, blandit mauris eget, condimentum nulla. Nullam dapibus turpis sed tempor iaculis. Cras vel porta tellus.

            Nam viverra dui at euismod accumsan. Nunc euismod eros at lectus suscipit, ut blandit dolor interdum. Sed ac turpis ultrices, egestas mauris vitae, lobortis nibh. Etiam a feugiat lorem, et lacinia tellus. Sed turpis massa, finibus quis varius at, consectetur sit amet massa. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse lacinia felis eget sapien consequat, sit amet finibus nulla scelerisque. Nulla quis ex in sem condimentum maximus non in neque. Morbi luctus nisi ac posuere tempor. Vestibulum egestas, tellus eu congue malesuada, erat purus auctor risus, at elementum lorem risus dignissim mauris. In ultrices tempus risus, finibus suscipit urna mollis ac. Phasellus ligula metus, ultrices et imperdiet a, euismod vel nibh. Cras aliquam feugiat sem, a convallis purus vehicula a.
            
            Donec tincidunt sodales ex, ornare mollis neque sagittis eu. Duis id consequat eros. Phasellus ullamcorper elit vel ipsum pharetra, ut pellentesque mi blandit. Praesent quis turpis turpis. Vivamus eu pellentesque nibh. Suspendisse fringilla lorem tellus, vel laoreet ipsum varius eget. Cras egestas purus non diam tincidunt ultricies. Etiam vel magna quis eros facilisis mattis. In hac habitasse platea dictumst. Curabitur ornare neque ac lectus placerat varius. Vivamus et accumsan nulla, vitae faucibus massa. Maecenas rutrum erat id est tincidunt, sed lacinia massa dapibus.',
            'created_at' => '05-08-2021',
            'author' => 'Joker',
        ]];
        return $posts;
    }

    public function store(){
        if(request('title') == null){
            return response("No title given", 400);
        }
    }

    public function getPostById($id){
        $posts = $this->getPosts();
        return $posts[$id - 1];
    }
}
