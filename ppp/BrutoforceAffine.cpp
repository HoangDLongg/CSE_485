//Lap trinh be khoa mat ma Affine bang phuong phap Bruto-force
//Dau vao CT la chuoi ki tu Cipher Text thu duoc tu bai Affine
//Hay xac dinh cap so {a, b} da su dung va noi dung cua plaintext ban dau
//HGHZQHRFGXYDP
#include<iostream>
#include<string>
using namespace std; 
int KT_S(char c){
	return c - 'A';
}
char S_KT(int n){
	return 'A' + n;
}
//Tinh nghich dao cua a
int nghichdao(int a){
	for(int i = 0; i < 26; i++){
		if((i * a) % 26 == 1){
			return i;
		}
	}
	return -1;
}
int main(){
	string P, C;
	int a, b;
	cout<<"Ciphertext can giai ma: "; getline(cin, C);
	int list_a[] = {1, 3, 5, 7, 9, 11, 15, 17, 19, 21, 23, 25};
	for(int i = 0; i < 12; i++) {
    	a = list_a[i];
		int a1 = nghichdao(a);
		if(a1 == -1) continue;
		for(b = 0; b < 26; b++){
			P = "";
			for(int i = 0; i < C.size(); i++){
				if(isupper(C[i])){
					int c = KT_S(C[i]);
					int p = (a1 * (c - b + 26)) % 26;
					P += S_KT(p);
				}
				else{
					P += C[i];
				}
			}
			cout<<"(a, b) = "<< "( "<<a<<", "<<b<<"): "<<P<<endl;
		}
	}
	
}


