from django.shortcuts import render
from Login.models import User,Contacts

# Create your views here.
def Home(request):
	return render(request, 'Home.html')
def about(request):
	return render(request, 'about.html')
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