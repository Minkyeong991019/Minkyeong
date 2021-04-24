from django.shortcuts import render
from django.contrib.auth import authenticate
from .models import User
from django.db import connection
from django.shortcuts import redirect
from django.contrib.auth.models import Group
from django.contrib.auth import login as auth_login

# Create your views here.
def login(request):
	return render(request, 'login.html')

def forgotpassword(request):
	return render(request, 'forgotpassword.html')

def Register(request):
	return render(request, 'Register.html')
def loginManager(request):
    if request.method == 'POST':
        userName = request.POST.get('userName','')
        passWord = request.POST.get('passWord','')
        user = authenticate(username=userName, password=passWord)
        if(user is not None):
            userID =  User.objects.filter(username = userName)[0].id
            with connection.cursor() as cursor:
                cursor.execute(
                    "SELECT auth_group.name FROM auth_group INNER JOIN login_user_groups ON auth_group.id = login_user_groups.group_id INNER JOIN login_user ON login_user.id = login_user_groups.user_id WHERE login_user.id = '%s'" ,
                    [userID]
                )
                auth_group = cursor.fetchall()[0][0]
            request.session.set_expiry(86400)
            auth_login(request, user)
            if(auth_group == "Guest"):
                return redirect('/')
        else:
            error = {'error': 'Username or password is incorrect !'}
            return render(request, 'login.html', error)
    else:
        if request.user.is_authenticated:
            return redirect('/')
        else:
            return render(request, 'login.html')
def RegisterAcount(request):
    if request.method == 'POST':
        userName = request.POST.get('username','')
        passWord1 = request.POST.get('password1','')
        passWord2 = request.POST.get('password2','')
        email = request.POST.get('email','')
        phone = request.POST.get('phone','')
        address = request.POST.get('address','')
        a = User.objects.filter(username = userName)
        if (passWord1 != passWord2):
            error = "Password confirmation is wrong !"
            return render(request, 'Register.html',{'error': error})
        elif len(a) != 0:
            error = "Username is already taken"
            return render(request, 'Register.html',{'error': error})
        elif passWord1 == passWord2:
            idguest = Group.objects.filter(name = 'Guest')[0].id 
            User.objects.create_user(username=userName, password=passWord1, email=email,PhoneNumber=phone, Address=address)
            user = User.objects.get(pk = User.objects.latest('id').id)
            user.groups.add(idguest)
            return redirect('/login')

    else:
        return render(request, 'Register.html')