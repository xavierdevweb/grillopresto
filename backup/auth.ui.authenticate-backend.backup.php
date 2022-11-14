<?php

// Vendor / Laravel / Ui / auth-backend / authenticate
// Cela verifie si quand kk1 se connecte si il y a des informations manquante a son dossier et devra les remplirs


// protected function credentials(Request $request)
// {
//     $request->validate([
//         'email' => ['required', 'string', 'email', 'max:255'],
//         'password' => ['required', 'string', 'min:8'],
//     ], [
//         'email.required' => 'Votre email est requis',
//         'email.string' => 'Votre email doit etre une chaine de caracteres',
//         'email.email' => 'Votre email doit etre du format email standard',
//         'email.max' => 'Votre email doit etre d\'une longueur de 255 carateres maximum',
//         'password.required' => 'Votre mot de passe est requis',
//         'password.string' => 'Votre mot de passe doit etre une chaine de caracteres',
//         'password.min' => 'Votre mot de passe doit etre d\'une longueur de 8 caracteres minimum'
//     ]
// );

//     return $request->only($this->username(), 'password');
// }

// /**
//  * Send the response after the user was authenticated.
//  *
//  * @param  \Illuminate\Http\Request  $request
//  * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
//  */
// protected function sendLoginResponse(Request $request)
// {
//     $request->session()->regenerate();

//     $this->clearLoginAttempts($request);

//     if ($response = $this->authenticated($request, $this->guard()->user())) {
//         return $response;
//     }

//     $userinfos = User::where('email', $request['email'])->get();
//     if($request->wantsJson()){
//       return new JsonResponse([], 204);
//     } elseif($userinfos[0]->info_user_id <= 0){
//         return redirect()->route('finish.registeration', ['user' => $userinfos[0]->id]);
//     } else {
//       return redirect()->intended($this->redirectPath());
//     }

// }

// /**
//  * The user has been authenticated.
//  *
//  * @param  \Illuminate\Http\Request  $request
//  * @param  mixed  $user
//  * @return mixed
//  */
// protected function authenticated(Request $request, $user)
// {

// }

// /**
//  * Get the failed login response instance.
//  *
//  * @param  \Illuminate\Http\Request  $request
//  * @return \Symfony\Component\HttpFoundation\Response
//  *
//  * @throws \Illuminate\Validation\ValidationException
//  */
// protected function sendFailedLoginResponse(Request $request)
// {
//     throw ValidationException::withMessages([
//         $this->username() => [trans('auth.noMatch')],
//     ]);
// }

?>