//Lap trinh mot chuoi ki tu tu ban phim, cong moi phan tu cua chuoi voi 3. Hien chuoi moi ra mh.
#include<iostream>
using namespace std;
int main(){
	string s;
	cout<<"Nhap chuoi ki tu: "; getline(cin, s);
	for(int i = 0; i < s.size(); i++){
		s[i] += 3;
	}
	cout<< "Chuoi moi sau khi cong 3 phan tu la: " << s << endl;
	for(int i = 0; i < s.size(); i++){
		s[i] -= 3;
	}
	cout<< "Chuoi giai ma: " << s;
}
