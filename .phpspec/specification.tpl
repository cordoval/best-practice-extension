<?php

namespace %namespace%;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use %subject%;

class %name% extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith();
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(%subject_name%::class);
    }
}
