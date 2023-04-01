@extends('layouts.general')

@section('title', 'Kode Voting')
@section('sub-title', 'Masukkan kode voting anda')

@section('css')

<style>
    .code {
        position: fixed;
        top: 30%;
        right: 0;
    }
    .input-field input {
        height: 45px;
        width: 42px;
        border-radius: 6px;
        outline: none;
        font-size: 1.125rem;
        text-align: center;
        border: 1px solid #ddd;
    }
    .input-field input:focus {
        box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
    }
    .input-field input::-webkit-inner-spin-button,
    .input-field input::-webkit-outer-spin-button {
        display: none;
    }

</style>
@endsection


@section('content')

<div class="col-md-12">
    <div class="code">
        <div class="text-center">
            <h1>MASUKKAN KODE VOTING</h1>
            <span class="text-center">
                Kode voting anda adalah
            </span>
            <div class="mt-2">
                <h1>{{$codeVoting}}</h1>
            </div>
        </div>
        <div class="mb-3">
            <form action="{{url('/voting')}}" method="POST">
                @csrf
                <div class="input-field d-flex justify-content-center mx-4 mb-3">
                    <input type="text" name="code[]" class="form-control w-50 me-3" maxlength="1">
                    <input type="text" name="code[]" class="form-control w-50 me-3" maxlength="1" disabled>
                    <input type="text" name="code[]" class="form-control w-50 me-3" maxlength="1" disabled>
                    <input type="text" name="code[]" class="form-control w-50" maxlength="1" disabled>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">SUBMIT</button>
                </div>
            </form>
        </div>

        @if (Session::has('message'))
            <div class="d-flex justify-content-center">
                <span class="text-danger text-center">{{Session::get('message')}}</span>
            </div>
        @endif
    </div>
</div>


@endsection

@section('js')

<script>
    const inputs = document.querySelectorAll("input"),
  button = document.querySelector("button");

// iterate over all inputs
inputs.forEach((input, index1) => {
  input.addEventListener("keyup", (e) => {
    // This code gets the current input element and stores it in the currentInput variable
    // This code gets the next sibling element of the current input element and stores it in the nextInput variable
    // This code gets the previous sibling element of the current input element and stores it in the prevInput variable
    const currentInput = input,
      nextInput = input.nextElementSibling,
      prevInput = input.previousElementSibling;

    // if the value has more than one character then clear it
    if (currentInput.value.length > 1) {
      currentInput.value = "";
      return;
    }
    // if the next input is disabled and the current value is not empty
    //  enable the next input and focus on it
    if (nextInput && nextInput.hasAttribute("disabled") && currentInput.value !== "") {
      nextInput.removeAttribute("disabled");
      nextInput.focus();
    }

    // if the backspace key is pressed
    if (e.key === "Backspace") {
      // iterate over all inputs again
      inputs.forEach((input, index2) => {
        // if the index1 of the current input is less than or equal to the index2 of the input in the outer loop
        // and the previous element exists, set the disabled attribute on the input and focus on the previous element
        if (index1 <= index2 && prevInput) {
          input.setAttribute("disabled", true);
          input.value = "";
          prevInput.focus();
        }
      });
    }
    //if the fourth input( which index number is 3) is not empty and has not disable attribute then
    //add active class if not then remove the active class.
    if (!inputs[3].disabled && inputs[3].value !== "") {
      button.classList.add("active");
      return;
    }
    button.classList.remove("active");
  });
});

//focus the first input which index is 0 on window load
window.addEventListener("load", () => inputs[0].focus());

</script>
@endsection
