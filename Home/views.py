from django.shortcuts import render
from Login.models import User,Contacts,Category,Packet,Service,Tour_guide,Booking,GroupService
from django.contrib.auth import authenticate
from django.contrib.auth import logout as django_logout

# Create your views here.
def Home(request):
	tour_guide = Tour_guide.objects.all()
	tour = Category.objects.all()
	if request.user.is_authenticated:
		Status = "<a class='button button-md button-default-outline-2 button-ujarak' href='/logout'>Logout</a>"
	else:
		Status = "<a class='button button-md button-default-outline-2 button-ujarak' href='/login'>Login</a>"
	return render(request, 'Home.html',{'tour': tour, 'Status': Status,'tour_guide':tour_guide})
def about(request):
	if request.user.is_authenticated:
		Status = "<a class='button button-md button-default-outline-2 button-ujarak' href='/logout'>Logout</a>"
	else:
		Status = "<a class='button button-md button-default-outline-2 button-ujarak' href='/login'>Login</a>"
	return render(request, 'about.html', {'Status': Status})
def logout(request):
    django_logout(request)
    return render(request, 'login.html')
def Contact(request):
	if request.user.is_authenticated:
		Status = "<a class='button button-md button-default-outline-2 button-ujarak' href='/logout'>Logout</a>"
	else:
		Status = "<a class='button button-md button-default-outline-2 button-ujarak' href='/login'>Login</a>"
	return render(request, 'contact-us.html', {'Status': Status})
def booking(request):
	packet = Packet.objects.all()
	service = Service.objects.all()
	if request.user.is_authenticated:
		Status = "<a class='button button-md button-default-outline-2 button-ujarak' href='/logout'>Logout</a>"
		return render(request, 'Booking.html', {'Status': Status,'packet':packet,'service':service})
	else:
		Status = "<a class='button button-md button-default-outline-2 button-ujarak' href='/login'>Login</a>"
		checklogin ='aa'
		return render(request, 'Booking.html', {'Status': Status, 'checklogin':checklogin })
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
def addbooking(request):
	if request.method == 'POST':
		Name = request.POST.get('name','')
		Time = request.POST.get('time','')
		Packet = request.POST.get('Packet','')
		service = request.POST.getlist('service','')
		Decrition = request.POST.getlist('decrition','')
		Booking.objects.create(Name=Name,Time=Time, UserID_id = request.user.id, PacketID_id = Packet, Status= 'True', Decription= Decrition)
		for serv in service:
			GroupService.objects.create(BookingID = Booking.objects.latest('id'), ServiceID_id = serv)
		return render(request, 'contact-us.html')
	else:
		return render(request,'Home.html')
def Packets(request):
	packet = Packet.objects.all()
	return render(request,'Packet.html', {'packet': packet})
def PacketID(request,id):
	packet = Packet.objects.filter(CategoryID = id)
	return render(request,'Packet.html', {'packet': packet})