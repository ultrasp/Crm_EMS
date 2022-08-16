export default class Gate{

    constructor(user){
        this.user = user;
    }

    isOwner(){
        return this.user.role === 'owner';
    }

    isManager(){
        return this.user.role === 'manager';
    }

    isDoctor(){
        return this.user.role === 'doctor';
    }

    isDoctorOrOwner(){
        return ['owner','doctor'].includes(this.user.role);
    }

    getUserName(){
        return this.user.name + ' ' + this.user.surname; 
    }

    getFullName(){
        return this.user.surname + ' ' + this.user.name + ' ' + this.user.nickname ; 
    }

    getFullName2(){
        return this.user.surname + ' ' + this.user.name.substr(0,1) + '. ' + this.user.nickname.substr(0,1) ; 
    }

    isActive(){
        return this.user.status === 3 || (this.user.status === 1 && this.user.subscriber_id > 0);
    }


    isSpecStom(){
        return this.user.specialization == 1;
    }

    getUser(){
    	return this.user;
    }

    update(user){
        this.user = Object.assign({}, this.user, user);
        console.log(this.user);
        // this.user = user;
    }
}

