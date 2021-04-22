from django.shortcuts import render
from Login.models import User,Contacts,Category
from django.contrib.auth import authenticate
from django.contrib.auth import logout as django_logout

# Create your views here.
def Home(request):
	tour = Category.objects.all()
	if request.user.is_authenticated:
		Status = "<a class='button button-md button-default-outline-2 button-ujarak' href='/logout'>Logout</a>"
	else:
		Status = "<a class='button button-md button-default-outline-2 button-ujarak' href='/login'>Login</a>"
	return render(request, 'Home.html',{'tour': tour, 'Status': Status})
def about(request):
	return render(request, 'about.html')
def logout(request):
    django_logout(request)
    return render(request, 'login.html')
def Contact(request):
	return render(request, 'contact-us.html')
def Typography(request):
	return render(request, 'typography.html')
def RegisterInformation(request):
	if request.method == 'POST':
		Name = request.POST.get('name','')
		Email = request.POST.get('email','')
		Phone = request.POST.get('phone','')
		message = request.POST.get('message','')
		Contacts.objects.create(Name = Name,PhoneNumber = Phone,Email = Email, Decription= message)
		return render(request, 'Home.html')
	else:
		return render(request, 'contact-us.html')